<?php

class cmsPlaintechModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getIndex(){
				$test = "index";
			    $sqlArray = $this->db->select('SELECT * FROM CMS_website WHERE 
						page = :page', 
                array('page' => $test));
                $i = 0;
			    while ($i < count($sqlArray)) {
			    	$id = $sqlArray[$i]['cwid'];
			    	$arr[$id] = $sqlArray[$i];
			    	$i++;
			    }
                return $arr;
	}


}
?>