<?php

/**
* 
*/

require_once("lib/cloudstack.php");

class registerModel extends baseModel
{
	
	public $cloudstack;
	
	function __construct()
	{
		parent::__construct();
		$this->cloudstack = new cloudstack();
	}
	
	public function register()
	{
		echo "Test!<br><pre>";

		// We controleren of alle velden gevuld zijn en vervolgens of de mail klopt
		/*
		if(empty($_POST['inputEmail']) || empty($_POST['inputPassword']) || empty($_POST['fname']) ||
                empty($_POST['lname']) || empty($_POST['number']) || empty($_POST['adzip']) || empty($_POST['adnr']) ||
                empty($_POST['country']) || !filter_var($_POST['inputEmail'],FILTER_VALIDATE_EMAIL)) {
			//header('location: ../register');
			echo "<br />Er is een fout in het formulier gevonden. Controleer alle velden nogmaals.<br />";
			echo "<a href=\"javascript:history.go(-1);\">Ga terug naar het formulier</a><br />";
			
		} else { */
			// We knallen alle Post-variabelen PHP variabelen in, dit is voor overzichtelijkheid.
			/*$userEmail = $_POST['inputEmail'];
			$userPassw = $_POST['inputPassword'];
			$userFname = $_POST['inputFName'];
			$userLname = $_POST['inputLName'];
			

			echo "$userFname <br />";
			echo "$userLname <br />";
			echo "$userEmail <br />";
			echo "$userPassw <br />";
			echo "<br /><br />";

			
			$test = $this->cloudstack->listAccountsByName();
			print_r($test);
			echo "<br /><br />";

			$accounttype = 0;
			*/

			$responce = $this->cloudstack->createAccount();

			print($responce);
		
			echo "<br />Gebruiker is succesvol aangemaakt.<br />";
		
		//}		
	}		
}
	
	
?>	
	
	