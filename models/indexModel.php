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
			    $hoi = "test";
				$sth = $this->db->prepare("SELECT id FROM CMS_website WHERE 
						page = :page");
				$sth->execute(array(
					':page' => $hoi
				));
		
				$data = $sth->fetchAll();
				//print_r($data);
				
				$count =  $sth->rowCount();
				if ($count > 0) {
					echo "</pre>";
					$pag="hij doettttt hetttttt";
					return $pag;
				} else {
					echo "hij &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&";
				}

			}


}
?>