<?php

/**
* 
*/
class klantPaneelModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
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
}

?>