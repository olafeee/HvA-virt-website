<?php

class cmsPlaintechModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getCmsIndex(){
			    $sqlArray = $this->db->select('SELECT page FROM CMS_website';
                return $sqlArray;
	}

	function getCmsIndex1($pageid){
			    $sqlArray = $this->db->select('SELECT * FROM CMS_website WHERE 
						page = :page', 
                array('page' => $pageid));
                $i = 0;
			    while ($i < count($sqlArray)) {
			    	$id = $sqlArray[$i]['cwid'];
			    	$arr[$id] = $sqlArray[$i];
			    	$i++;
			    }
                return $arr;
	}

	function editContent($id){

	}


}
?>