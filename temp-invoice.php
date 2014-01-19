<?php
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
//															 	  //
//	Helloooooo :D 		  										  //
//	parse_ini_file komt er misschien nog aan voor settings van	  //
//	de factuur, zoals adresgegevens van Plaintech		   		  //
//									   							  //
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
// Initialize variables
require('./views/createInvoice/invoice/invoice.php');

if (empty($_SESSION['cart'])){
	header('location /order');
}

$klantNaam = "Dhr K. LANT";
$klantStraat = "Duivendrechtsekade 36-38";
$klantPostcode = "1096 AH";
$klantWoonplaats = "Amsterdam";
$klantLand = "Netherlands";
$factuurNummer = "VPS".rand(10000,99999);
$klantNummer = substr(base_convert(md5($klantNaam), 16, 10),0,7);
$incassoTijd = "14";

//session_start();
//$_SESSION['klantTaal'] = "EN";
//$klantTaal = $_SESSION['klantTaal'];

$klantTaal = "EN";

if($klantTaal == "NL"){setlocale (LC_TIME, "nl_NL.UTF-8");}else{setlocale (LC_TIME, "en_US.UTF-8");}

$pdf = new PDF_Invoice( 'P', 'mm', 'A4', $klantTaal );
// niet de spatie weghalen! dan doet ie t niet meer, dunno y..
$pdf->SetAuthor("Plaintech ");
$pdf->SetTitle("Invoice ".$factuurNummer);
$pdf->AddPage();
$pdf->addKlantadres( $klantNaam,
                  $klantStraat."\n" .
                  $klantPostcode." ".$klantWoonplaats."\n" .
                  $klantLand);
	$lalala = "/var/www/img/plaintech-logo.png";			  
				  
$pdf->Image($lalala, 135, 12, 60, 15);
if($klantTaal == "NL"){$pdf->addFactuur("Factuur");}else{$pdf->addFactuur("Invoice");}
$pdf->addCompanyAddress("Plaintechstraat 1, 1234 AB, Amsterdam");
$pdf->addKvkInfo("12345678","NL123456789B01");
$pdf->addWebsite("www.plaintech.nl","sales@plaintech.nl");
$pdf->addFactuurNummer($factuurNummer);
$pdf->addFactuurDatum(strftime("%e / %B / %Y"));
if(!isset($autoIncasso)){
	$pdf->addBetaalDatum(strftime("%e / %B / %Y", strtotime("+$incassoTijd day")));
}
$pdf->addKenmerk("AI-".$factuurNummer."-".$klantNummer);
$pdf->addKlantNummer($klantNummer);
$cols=array( "ProductID"    => 35,
             "Description" => 90,
             "Quantity"       => 17,
             "Unit Price"       => 24,
             "Subtotal"    => 24);
$pdf->addCols($cols);
$cols=array( "ProductID"    => "L",
             "Description" => "L",
             "Quantity"       => "R",
             "Unit Price"       => "R",
             "Subtotal"    => "R");
$pdf->addLineFormat($cols);

$y    = 109;
if (!empty($_SESSION['cart'])) {
$max = count($_SESSION['cart']);
		$tot_calc = 0;
	  
		for($i=0;$i<$max;$i++){
			$prid = $_SESSION['cart'][$i]['productid'];
            $CPU  = $_SESSION['cart'][$i]['qty']['CPU'];
            $RAM  = $_SESSION['cart'][$i]['qty']['RAM'];
            $DISK = $_SESSION['cart'][$i]['qty']['DISK'];
            $NT   = $_SESSION['cart'][$i]['qty']['NT'];
            $IPv4 = $_SESSION['cart'][$i]['qty']['IPv4'];
            $OS   = $_SESSION['cart'][$i]['qty']['OS'];
            $SLA  = $_SESSION['cart'][$i]['qty']['SLA'];
            $TP   = $_SESSION['cart'][$i]['qty']['TP'];
			
		$line = array( "ProductID"    => $prid,
               "Description" => "BladeVPS\n" .
                 "Operating System: 	$OS\n" .
                 "CPU cores:		$CPU\n" .
				 "RAM:		$RAM MB\n" .
				 "Harddisk:		$DISK GB\n" .
				 "Networktraffic:	$NT\n" .
				 "IPv4 Adresses:	$IPv4\n" .
				 "SLA:		$SLA\n\n",
               "Quantity"       => "1",
               "Unit Price"       => "$TP",
               "Subtotal"    => "$TP");
		$size = $pdf->addLine( $y, $line );
		$y   += $size + 2;
			
		$tot_calc = $tot_calc + $TP;
		$_SESSION['totaalbedrag'] = $tot_calc;
		}
}
$tot_calc = $_SESSION['totaalbedrag'];
$tot_calc = round($tot_calc, 2);

// je kan evt nog een opmerking onder de tabel zetten
// gewoon volgende regel uncommenten en opmerking in
// de " " plaatsen...
// $pdf->addOpmerking("Voorbeeldopmerking");

$pdf->addTotaalBedrag($tot_calc);
$pdf->Output('invoice.pdf', 'I');
?>