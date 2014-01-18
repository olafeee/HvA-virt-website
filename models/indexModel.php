<?php

class indexModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
		$this->conDB();
		echo"text";
	}

	function getIndex(){
				$sql = "SELECT text FROM CMS_website WHERE page > :page";
				//$sql = "SELECT naam FROM tabel WHERE leeftijd > :leeftijd"; 
			     
			    $stmt = $this->$conDB->prepare($sql); 
			    $stmt->bindParam(':page', $page, PDO::PARAM_INT); 
			     
			    $leeftijd = "test"; 
			    $stmt->execute(); 
			     
			    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
			    { 
			        var_dump($row);
			    } 

	}


}
?>