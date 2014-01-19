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
			    while ($i < count($sqlArray)) {
			    	echo $i;
			    	echo "<br/>";
			    	$id = $sqlArray[$i];
			    	$arr = array($id['cwid'] => $id['cmstext'] );
			    	$i++;
			    }
			    print_r($arr);
			    echo "<br/>";
                return $arr;

			}


}
?>