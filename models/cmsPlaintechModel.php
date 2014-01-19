<?php

class cmsPlaintechModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getCmsIndex(){
			    $sqlArray = $this->db->selectAll('SELECT * FROM CMS_pages');
                return $sqlArray;
	}

	function getPage($pageid){
			    $sqlArray = $this->db->select('SELECT * FROM CMS_website WHERE 
						pageid = :pageid', 
                array('pageid' => $pageid));
                return $sqlArray;
	}

	function getPage($pageid, $cwid){
			    $sqlArray = $this->db->select('SELECT * FROM CMS_website WHERE 
						pageid = :pageid AND cwid = :cwid', 
                array('pageid' => $pageid, 'cwid' => $cwid));
                return $sqlArray;
	}

	function getCmsIndex1($pageid){
			    $sqlArray = $this->db->select('SELECT * FROM CMS_website WHERE 
						pageid = :pageid', 
                array('pageid' => $pageid));
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