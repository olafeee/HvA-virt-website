<?php
// Hoofdklasse nodig voor het maken van de pdf
require('fpdf.php');

// Zorgt ervoor dat euroteken in alle fonts beschikbaar is
define('EURO', chr(128) );

// Aanmaken van de class PDF_invoice, als uitbreiding op de hoofdclass fpdf
class PDF_Invoice extends FPDF {
// definieren van variabelen die door meerdere functies gebruikt worden
var $kolom;
var $format;
var $angle=0;
var $klantTaal;

// Einde van een pagina aangeven
function _endpage() {
	if($this->angle!=0)	{
		$this->angle=0;
		$this->_out('Q');
	}
	parent::_endpage();
}

// breedte van de text berekenen om binnen het gebied te blijven
function sizeOfText( $text, $grootte ) {
	$index    = 0;
	$nb_lines = 0;
	$loop     = TRUE;
	while ( $loop )	{
		$pos = strpos($text, "\n");
		if (!$pos) {
			$loop  = FALSE;
			$line = $text;
		} else {
			$line  = substr( $text, $index, $pos);
			$text = substr( $text, $pos+1 );
		}
		$length = floor( $this->GetStringWidth( $line ) );
		$res = 1 + floor( $length / $grootte) ;
		$nb_lines += $res;
	}
	return $nb_lines;
}

// Uitlijnen en font van klantadres
function addKlantAdres( $naam, $adres ) {
	$x1 = 15;
	$y1 = 20;
	$this->SetXY( $x1, $y1 );
	$this->SetFont('Arial','B',14);
	$length = $this->GetStringWidth( $naam );
	$this->Cell( $length, 2, $naam);
	$this->SetXY( $x1, $y1 + 4 );
	$this->SetFont('Arial','',12);
	$length = $this->GetStringWidth( $adres );
	$lines = $this->sizeOfText( $adres, $length) ;
	$this->MultiCell($length, 4, $adres);
}

// Uitlijnen en font van "Invoice" text
function addFactuur($added){
	$r1 = 15;
	$y1 = 55;
	$this->SetFont("Arial","B",28);
	$this->SetXY($r1,$y1);
	$length = $this->GetStringWidth($added);
	$this->Cell($length, 2, $added);
}

// Uitlijnen en font van bedrijfsadres
function addCompanyAddress( $address ) {
	$this->SetFont("Times", "", 12);
	$r1 = 42;
	$y1     = 40;
	$this->SetXY( $r1, $y1);
	$this->Cell(160,10,$address,0,0,"R");
}

// Ik was bezig met fonts, lukt wel, maar lijkt me lame...
// Als je kvk en btw dikgedrukt wil moet je $kvk1 en $btw1 
// dikdrukken, maar ook $kvk en $btw weer normaaldrukken..
// Anyway, hier uitlijnen en font kvk/btw nummer
function addKvkInfo($kvk,$btw){
	$btw1 = " BTW-nr: ";
	$kvk1 = "KvK-nr: ";
	$this->SetFont("Times", "", 12);
	$kvkline = $kvk1.$kvk.$btw1.$btw;
	$r1 =  42;
	$y1  = 45;
        $this->SetXY( $r1, $y1);
        $this->Cell(160,20,$kvkline,0,0,"R");
}

// en uitlijnen + font vd website en email..
function addWebsite($website,$mailadres){
        $this->SetFont("Times", "", 12);
        $r1 = 42;
	$y1     = 50;
        $this->SetXY( $r1, $y1);
	$url = "Website: ".$website." E-Mail: ".$mailadres;
        $this->Cell(160,30,$url,0,0,"R");
}

// Factuurnummer met uitlijning en font
function addFactuurNummer( $factuurNummer ){
	global $klantTaal;
	$r1  = -5;
	$r2  = $r1 + 40;
	$y1  = 80;
	$y2  = $y1+10;
	$mid = $y1 + (($y2-$y1) / 2);
	$this->SetXY( $r1 + ($r2-$r1)/2 -5 , $y1+1 );
	$this->SetFont( "Arial", "B", 10);
	if ($klantTaal == "NL"){
		$this->Cell(10,4, "Factuurnummer", 0, 0, "L");
	}else/*($klantTaal == "EN")*/{
		$this->Cell(10,4, "Invoice Number", 0, 0, "L");
	}
	$this->SetXY( $r1 + ($r2-$r1)/2 -5 , $y1 + 5 );
	$this->SetFont( "Arial", "", 10);
	$this->Cell(10,5,$factuurNummer, 0,0, "L");
}

// 3x raden :P
function addFactuurDatum( $date ) {
	global $klantTaal;
	$r1  = 28;
	$r2  = $r1 + 40;
	$y1  = 80;
	$y2  = $y1+10;
	$mid = $y1 + (($y2-$y1) / 2);
	$this->SetXY( $r1 + ($r2 - $r1)/2 - 5 , $y1+1 );
	$this->SetFont( "Arial", "B", 10);
	if($klantTaal == "NL"){$this->Cell(10,4, "Factuurdatum", 0, 0, "L"); }else{ $this->Cell(10,4, "Date of Invoice", 0, 0, "L");}
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5 , $y1 + 5 );
	$this->SetFont( "Arial", "", 10);
	$this->Cell(10,5,$date, 0,0, "L");
}

// en de uiterlijke betaaldatum, 2 weken verder
// wordt automatisch berekend in createInvoice.php
function addBetaalDatum( $date ) {
	global $klantTaal;
        $r1  = 65;
        $r2  = $r1 + 40;
        $y1  = 80;
        $y2  = $y1+10;
        $mid = $y1 + (($y2-$y1) / 2);
        $this->SetXY( $r1 + ($r2 - $r1)/2 - 5 , $y1+1 );
        $this->SetFont( "Arial", "B", 10);
        if($klantTaal == "NL"){$this->Cell(10,4, "Uiterste betaaldatum", 0, 0, "L");}else{$this->Cell(10,4, "Due By",0,0,"L");}
        $this->SetXY( $r1 + ($r2-$r1)/2 - 5 , $y1 + 5 );
        $this->SetFont( "Arial", "", 10);
        $this->Cell(10,5,$date, 0,0, "L");
}

// Referentie uitlijning en font
function addKenmerk( $kenmerk ) {
	global $klantTaal;
        $r1  = 108;
        $r2  = $r1 + 40;
        $y1  = 80;
        $y2  = $y1+10;
        $mid = $y1 + (($y2-$y1) / 2);
        $this->SetXY( $r1 + ($r2 - $r1)/2 - 5 , $y1+1 );
        $this->SetFont( "Arial", "B", 10);
        if($klantTaal == "NL"){$this->Cell(10,4, "Kenmerk", 0, 0, "L");}else{$this->Cell(10,4, "Reference", 0, 0, "L");}
        $this->SetXY( $r1 + ($r2-$r1)/2 - 5 , $y1 + 5 );
        $this->SetFont( "Arial", "", 10);
	$this->Cell(10,5,$kenmerk, 0,0, "L");
}

// en klantnummer (customer id)
function addKlantNummer($klantNummer)
{
	global $klantTaal;
	$this->SetFont( "Arial", "B", 10);
	$r1 = 154;
	$r2  = $r1 + 70;
	$y1  = 80;
	$y2  = $y1+10;
	$mid = $y1 + (($y2-$y1) / 2);
	$this->SetXY( $r1 + 16 , $y1+1 );
	if($klantTaal == "NL"){$this->Cell(40, 4, "Klantnummer", '', '', "L");}else{$this->Cell(10,4, "Customer ID", 0, 0, "L");}
	$this->SetFont( "Arial", "", 10);
	$this->SetXY( $r1 + 16 , $y1+5 );
	$this->Cell(40, 5, $klantNummer, '', '', "L");
}

// aanmaken van de kolommen voor productbeschrijving
function addCols( $tab ){
	global $kolom;	

	$r1  = 10;
	$r2  = $this->w - ($r1 * 2) ;
	$y1  = 100;
	$y2  = $this->h - 50 - $y1;
	$this->SetXY( $r1, $y1 );
	$this->Rect( $r1, $y1, $r2, $y2, "D");
	$this->Line( $r1, $y1+6, $r1+$r2, $y1+6);
	$colX = $r1;
	$kolom = $tab;
	while ( list( $lib, $pos ) = each ($tab) ){
		$this->SetXY( $colX, $y1+2 );
		$this->Cell( $pos, 1, $lib, 0, 0, "C");
		$colX += $pos;
		$this->Line( $colX, $y1, $colX, $y1+$y2);
	}
}

// vullen van de kolommen met producten
function addLineFormat( $tab ) {
	global $format, $kolom;
	
	while ( list( $lib, $pos ) = each ($kolom) ) {
		if ( isset( $tab["$lib"] ) )
			$format[ $lib ] = $tab["$lib"];
	}
}

// verticale lijnen voor de kolommen
function lineVert( $tab ){
	global $kolom;

	reset( $kolom );
	$maxSize=0;
	while ( list( $lib, $pos ) = each ($kolom) ){
		$text = $tab[ $lib ];
		$longCell  = $pos -2;
		$size = $this->sizeOfText( $text, $longCell );
		if ($size > $maxSize)
			$maxSize = $size;
	}
	return $maxSize;
}

// passen van tekst binnen kolom
function addLine( $line, $tab ) {
	global $kolom, $format;

	$geb     = 10;
	$maxSize      = $line;

	reset( $kolom );
	while ( list( $lib, $pos ) = each ($kolom) ){
		$longCell  = $pos -2;
		$text     = $tab[ $lib ];
		$length    = $this->GetStringWidth( $text );
		$textbreed = $this->sizeOfText( $text, $length );
		$formText  = $format[ $lib ];
		$this->SetXY( $geb, $line-1);
		$this->MultiCell( $longCell, 4 , $text, 0, $formText);
		if ( $maxSize < ($this->GetY()  ) )
			$maxSize = $this->GetY() ;
		$geb += $pos;
	}
	return ( $maxSize - $line );
}

// evt opmerking onderaan de kolom
function addOpmerking($opm) {
	$this->SetFont( "Arial", "I", 10);
	//$this->SetTextColor(96,96,96);
	$length = $this->GetStringWidth( "Note: " . $opm );
	$r1  = 10;
	$r2  = $r1 + $length;
	$y1  = $this->h - 45.5;
	$y2  = $y1+5;
	$this->SetXY( $r1 , $y1 );
	$this->Cell($length,4, "Note: " . $opm);
}

// uitlijning en berekening van de totaalbedragen
function addTotaalBedrag($tot_calc) {
	//global $klantTaal;
	// php pakt kommagetallen alleen met punten
	$tot_calc = str_replace(',', '.', $tot_calc);
	$ex_btw = round((($tot_calc / 121) * 21), 2);
	$ex_btw = str_replace('.', ',', $ex_btw);
	$sub_ex = round((($tot_calc / 121) * 100), 2);
	$sub_ex = str_replace('.', ',', $sub_ex);
	$tot_calc = str_replace('.', ',', $tot_calc);

	$r1  = $this->w - 90;
	$r2  = $r1 + 60;
	$y1  = $this->h - 45;
	$y2  = $y1+20;

	//??????$this->SetFont( "Arial", "B", 8);
	//??????$this->SetXY( $r1+22, $y1 );
	$this->SetFont( "Arial", "", 8);

	$this->SetXY( $r1, $y1+5 );
	$this->Cell(20,4, "Subtotal exl. VAT", 0, 0, "R");
	$this->SetXY( $r1+40, $y1+5 );
	$this->Cell(20,4, EURO.$sub_ex, 0,0,"R");	
	$this->SetXY( $r1, $y1+10 );
	$this->Cell(20,4, "VAT (21%)", 0, 0, "R");
	$this->SetXY( $r1+40, $y1+10 );
	$this->Cell(20,4, EURO.$ex_btw, 0,0,"R");	
	$this->SetXY( $r1, $y1+18 );
	$this->SetFont("Arial","B", 14);
	$this->Cell(20,4, "Total", 0, 0, "R");
	$this->SetXY( $r1+40, $y1+18);
	$this->Cell(20,4, EURO.$tot_calc, 0, 0, "R"); 
}
}
?>
