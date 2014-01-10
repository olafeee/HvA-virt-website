<?php

require_once("lib/cloudstack.php");

class Register extends baseController {

	public cloudstack = new cloudstack();

	function __construct() {
		parent::__construct();
	}
	
	function registreer(){
		$model = $this->loadModel();
		$model->registreer();
	}

	function checkAccount($email)
	{
		

		$cloudstack->listAccounts

		if() {
			return true;
		} else {
			return false;
		}
	}

	function register()
	{
		// We controleren of alle velden gevuld zijn en vervolgens of de mail klopt
		if(empty($_POST['inputEmail']) || empty($_POST['inputPassword']) || empty($_POST['fname']) ||
		empty($_POST['lname']) || empty($_POST['number']) || empty($_POST['adzip']) || empty($_POST['adnr']) || 
		empty($_POST['country']) || !filter_var($_POST['inputEmail'],FILTER_VALIDATE_EMAIL)) {
			echo "Er is een fout in het formulier gevonden. Controleer alle velden nogmaals.";
			echo "<a href=\"javascript:history.go(-1);\">Ga terug naar het formulier</a>";
			
		} elseif($cloudstack->listAccountsByName($_POST['inputEmail'])) {
			// Check of de account niet al bestaad


		} else { 
			// We knallen alle Post-variabelen PHP variabelen in, dit is voor overzichtelijkheid.
			$userEmail = $_POST['inputEmail'];
			$userPassw = $_POST['inputPassword'];
			$userFname = $_POST['fname'];
			$userLname4 = $_POST['lname'];


	}
}