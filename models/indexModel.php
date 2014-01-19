<?php

class indexModel extends baseModel
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
			    while ($i <= count($sqlArray)) {
			    	echo $i;
			    	echo "<br/>";
			    	$id = $sqlArray[0];
			    	$arr = array($id['cwid'] => $id['cmstext'] );
			    	$i++;
			    }

                return $arr;

			}


}
?>