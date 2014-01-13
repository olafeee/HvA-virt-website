<?php
require_once("lib/cloudstack.php");
/**
* 
*/
class klantPaneelModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getVM(){
		  $cloud = new cloudstack();
          $cloud->responseType = 'json';

          Session::init();
          // Bouw een 3D array van de JSON responce
          $vmResponce = $cloud->listVirtualMachines();
          $vmResponce = json_decode($vmResponce, true);

          // Bouw nu een array for elke VM
          $vmResponce = $vmResponce['listvirtualmachinesresponse'];
          $vmResponce = $vmResponce['virtualmachine'];

          // Haal de vms er uit van de gebruiker die ingeloged is

	}

	public function wijzigWachtwoord()
	{
		$username = $_SESSION['gebruikersnaam'];
		$password = $_POST['password'];
		$passwordnieuw = $_POST['passwordnieuw'];
		$passwordnieuw2 = $_POST['passwordnieuw2'];

		if ($passwordnieuw == $passwordnieuw2) {
			
			$sth = $this->db->prepare("SELECT id FROM users WHERE 
			login = :login AND password = :password");
			$sth->execute(array(
				':login' => $username,
				':password' => $password
			));
				$data = $sth->fetchAll();

			$count =  $sth->rowCount();
			if ($count > 0) {
		 		//CHANGE PASSWORD
				$sth = $this->db->prepare("UPDATE users SET password = :password WHERE login = :login");
				$sth->execute(array(
					':login' => $username,
					':password' => $passwordnieuw
				));
				
				header('location: ../klantPaneel/mijnAccount');

			} else {
				header('location: ../klantPaneel/mijnAccount');
			}
		}else{
			header('location: ../klantPaneel/mijnAccount');
		}
		
		

		
	}
	
	function accountFilter($account)
          {
              return (is_array($account) && $account['account'] == $_SESSION['account']);
          }
          //print_r(array_filter($vmResponce, "accountFilter"));

          // maak van subnet een prifix
          function prefixSubnet($input){
            $subBin = explode( '.', $input );
            $subBinX = 0;
            $subnet = 0;

            while ($subBinX <= 3) {
              $x = decbin($subBin[$subBinX]);
              $var3 = strlen(str_replace('0', '', $x));
              $subnet = $subnet + $var3;
              $subBinX++;
            }
            return $subnet;
          }
}

?>