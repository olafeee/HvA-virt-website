<?php

class indexModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getIndex(){
				$test = "test";
			    $sqlArray = $this->db->select('SELECT * FROM CMS_website WHERE 
						page = :page', 
                array('page' => $test));
                print_r($sqlArray);
                $i = 0;
			    while ($i <= count($sqlArray)) {
			    	$id = $sqlArray[0];
			    	$arr = array($id['cwid'] => $id['cmstext'] );
			    	$i++;
			    }

                return $arr;

			}


}
?>