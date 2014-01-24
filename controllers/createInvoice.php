<?php

class createInvoice extends baseController {

function __construct(){
	self::makeInvoice();
}

function makeInvoice(){
	error_reporting(E_ALL);
	ini_set('display_errors', 1);


	session_start();
	// Initialize variables
	require('./lib/invoice/invoice.php');

	if (empty($_SESSION['cart'])){
		if(header('location /order')){
			exit;
		}else{
			die ("<h1><center><a href=\"/order\">Please order first</a></center></h1>");
		}
	}

	/*if (empty($_SESSION['logArr'])){
		if(header('location /account')){
			exit;
		}else{
			die ("<h1><center><a href=\"/account\">Please login first</a></center></h1>");
		}
	}*/
	
	//Do NOT remove, otherwise script may generate variable error if user forgets to log in
	if (empty($_SESSION['logArr'])){
	die('not logged in');
		$klantNaam = "";
		$klantStraat = "";
		$klantPostcode = "";
		$klantWoonplaats = "";
		$klantLand = "";
	}	
	
	// Okee toen werd ik er dus helemaal ******ziek van...
	/*$invoice = new mysqli(NULL,DB_USER1,DB_PASS1,DB_NAME1);
	$first = $_SESSION['logArr']['firstname'];
	$laste = $_SESSION['logArr']['lastname'];

				//$sth = $invoice->prepare("INSERT INTO `user_db_plaintech`.`invoice_users` (`firstname`, `lastname`, `street`, `zip`, `city`, `country`) VALUES (?,?,?,?,?,?);");
				//$sth->bind_param('ssssss', $_POST['fname'],$_POST['lname'],$_POST['adstr'],$_POST['adzip'],$_POST['adcit'],$_POST['country']);
				//$sth->execute();
	
	//$query = "SELECT fname, lname, adstr, adzip, adcit, country FROM invoice_users WHERE fname = $first AND lname = $laste LIMIT 1 VALUES (?,?,?,?,?,?)";
	$query = "SELECT firstname, lastname, street, zip, city, country FROM invoice_users WHERE firstname = $first AND lastname = $laste LIMIT 1";
	//$stmt = mysqli_prepare($invoice, $query);
	//$stmt = $invoice->stmt_init();
	$stmt = $invoice->prepare($query);
	//printf(mysqli_stmt_error($sth));
	//$stm = $sth->execute();
	//$stmt->execute();
	//$stmt->bind_param("ssssss", $klantFNaam, $klantLNaam, $klantStraat, $klantPostcode, $klantWoonplaats, $klantLand);
	//$invoice->bind_result($klantFNaam, $klantLNaam, $klantStraat, $klantPostcode, $klantWoonplaats, $klantLand);
	$invoice->execute($stmt);
	//printf(mysqli_stmt_error($sth));
	$stmt->bind_result($klantFNaam, $klantLNaam, $klantStraat, $klantPostcode, $klantWoonplaats, $klantLand);
	if($stmt->fetch() === 0){
		die("somehow, something went somewhere wrong...");
	}*/
	$invoice = new mysqli('localhost','user_admin','T=56(Wp23', 'user_db_plaintech');
	if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}
	
	//mysqli_select_db($invoice, 'user_db_plaintech');
	$first = $_SESSION['logArr']['firstname'];
	$laste = $_SESSION['logArr']['lastname'];
	
	//die ($first . " AND " . $laste);
	
	//$query = "SELECT firstname, lastname, street, zip, city, country FROM invoice_users WHERE firstname = $first AND lastname = $laste LIMIT 1";
	$query = 'SELECT * FROM invoice_users WHERE firstname=$first AND lastname=$laste LIMIT 3';
	$sth = mysqli_query($invoice, $query);
	$row = mysqli_fetch_assoc($sth);
	
	$klantFNaam = $row['firstname'];
	$klantLNaam = $row['lastname'];
	$klantStraat = $row['street'];
	$klantPostcode = $row['zip'];
	$klantWoonplaats = $row['city'];
	$klantLand = $row['country'];
	
	//die($row);
	
	$klantNaam =  $klantFNaam." ".$klantLNaam;
	
	/*$this->db->select('Select invoice_users FROM user_db_plaintech WHERE id = :id ', array(
				//'id' =>
				'firstname' => $klantNaamF,
				'lastname' => $klantNaamL,
				'street' => $klantStraat,
				'zip' => $klantPostcode,
				'city' => $klantWoonplaats,
				'country' => $klantLand));
				*/
				
				
	//$klantNaam = $_SESSION['logArr']['firstname']." ".$_SESSION['logArr']['lastname'];
	//$klantNaam = "Dhr K. LANT";
	//$klantStraat = 
	//$klantStraat = "Duivendrechtsekade 36-38";
	//$klantPostcode = "1096 AH";
	//$klantWoonplaats = "Amsterdam";
	//$klantLand = "Netherlands";
	
//	$this->db->select('SELECT invoice_users FROM user_db_plaintech WHERE id = :id ', array('CSID' => $CSID));
	
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
	$pdf->addFactuurDatum(strftime("%d / %B / %Y"));
	if(!isset($autoIncasso)){
		$pdf->addBetaalDatum(strftime("%d / %B / %Y", strtotime("+$incassoTijd day")));
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
	$pdf->Output('/tmp/1.pdf', 'F');
	self::sentInvoice("a@b.c", "/tmp/1.pdf");
	}
	
function sentInvoice($email, $file){
	$subject = "Invoice from Plaintech"; 
	$random_hash = md5(date('r', time())); 
	$headers = "From: info@plaintech.nl"; 
	$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\""; 
	$attachment = chunk_split(base64_encode(file_get_contents($file))); 
	ob_start();
	?> 
	--PHP-mixed-<?php echo $random_hash; ?>  
	Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>" 

	--PHP-alt-<?php echo $random_hash; ?>  
	Content-Type: text/plain; charset="iso-8859-1" 
	Content-Transfer-Encoding: 7bit

	Hello World!!! 
	This is simple text email message. 

	--PHP-alt-<?php echo $random_hash; ?>  
	Content-Type: text/html; charset="iso-8859-1" 
	Content-Transfer-Encoding: 7bit

	<h2>Hello World!</h2> 
	<p>This is something with <b>HTML</b> formatting.</p> 

	 --PHP-alt-<?php echo $random_hash; ?>-- 

	--PHP-mixed-<?php echo $random_hash; ?>  
	Content-Type: application/zip; name="attachment.zip"  
	Content-Transfer-Encoding: base64  
	Content-Disposition: attachment  

	<?php echo $attachment; ?> 
	--PHP-mixed-<?php echo $random_hash; ?>-- 

	<?php 
	$message = ob_get_clean(); 
	$mail_sent = mail( $email, $subject, $message, $headers ); 
	//echo $mail_sent ? "Mail sent" : "Mail failed"; 
	
	//$fp = fopen('/tmp/data.txt', 'w');
	//fwrite($fp, $message);
	//fclose($fp);
	
}
}