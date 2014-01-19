<?php

class indexModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getIndex(){
				$test = "2";
			    $sqlArray = $this->db->select('SELECT * FROM CMS_website WHERE 
						page = :page', 
                array('page' => $test));
                $i = 0;
			    while ($i <= count($sqlArray)) {
			    	$id = $sqlArray[0]["cwid"];
			    	$i++;
			    }

                return $id;
			}


}
?>