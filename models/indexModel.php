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
			    $test = "2";
			    return $this->db1->select('SELECT * FROM CMS_website WHERE 
						cwid = :cwid', 
                array('cwid' => $test));
			}


}
?>