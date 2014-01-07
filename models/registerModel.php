<?php

/**
* 
*/
class registerModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function registreer()
	{
		// We controleren of alle velden gevuld zijn en vervolgens of de mail klopt
		if(empty($_POST['inputEmail']) || empty($_POST['inputPassword']) || empty($_POST['fname']) ||
		empty($_POST['lname']) || empty($_POST['number']) || empty($_POST['adzip']) || empty($_POST['adnr']) || 
		empty($_POST['country']) || !filter_var($_POST['inputEmail'],FILTER_VALIDATE_EMAIL)) {
			echo "Er is een fout in het formulier gevonden. Controleer alle velden nogmaals.";
			echo "<a href=\"javascript:history.go(-1);\">Ga terug naar het formulier</a>";
			
		} else { 
			// We knallen alle Post-variabelen PHP variabelen in, dit is voor overzichtelijkheid.
			$userEmail4 = $_POST['inputEmail'];
			$userPassw4 = $_POST['inputPassword'];
			$userFname4 = $_POST['fname'];
			$userLname4 = $_POST['lname'];
			$userNumber = $_POST['number'];
			$userZipcod = $_POST['adzip'];
			$userAdnumb = $_POST['adnr'];
			$userCounty = $_POST['country'];
			
			// We maken gebruik van prepared statements en moeten deze dus al aanmaken.
			$statemt = $dbh->prepare("INSERT INTO users (login, password, firstname, lastname, phone, zipcode, housenumber, country) 
			VALUES (:login, :password, :fname, :lname, :number, :adzip, :adnr, :country)");
			
			// We linken de variabelen aan de statements, misschien niet de minste code, maar het werkt.
			$statemt->bindParam(':login', $userEmail4);
			$statemt->bindParam(':password', $userPassw4);
			$statemt->bindParam(':fname', $userFname4);
			$statemt->bindParam(':lname', $userLname4);
			$statemt->bindParam(':number', $userNumber);
			$statemt->bindParam(':adzip', $userZipcod);
			$statemt->bindParam(':adnr', $userAdnumb);
			$statemt->bindParam(':country', $userCounty);
			
			// en daarna voeren we de query uit.
			$statemt->execute();
		
			echo "Gebruiker is succesvol aangemaakt.";
		
		}		
	}		

	
	
	
	
	