<?php

class indexModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getIndex(){
				/*$sql = "SELECT naam FROM tabel WHERE leeftijd > :leeftijd"; 
			     
			    //$stmt = $this->$db->prepare($sql); 
			    $stmt = $this->db->prepare("SELECT text FROM CMS_website WHERE page > :page");

			    $stmt->bindParam(':page', $page, PDO::PARAM_INT); 
			     
			    $page = "test"; 
			    $stmt->execute(); 
			     
			    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
			    { 
			         echo $row['text'].'<br>'; 
			    } */
			    $hoi = "xxl";
				$sth = $this->db->prepare("SELECT * FROM CMS_website WHERE 
						page = $hoi");
				$sth->execute();
		
				$data = $sth->fetchAll();
				//print_r($data);
				
				return $data;

			}


}
?>