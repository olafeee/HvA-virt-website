<?php

class cmsPlaintechModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getCmsIndex($table ,$part){
			    $sqlArray = $this->db->selectAll("SELECT $part FROM $table");
                return $sqlArray;
	}

	function getPage($pageid){
			    $sqlArray = $this->db->select('SELECT * FROM CMS_website WHERE 
						pageid = :pageid', 
                array('pageid' => $pageid));
                return $sqlArray;
	}

	function getOneCmsItem($pageid, $cwid){
			    $sqlArray = $this->db->select('SELECT * FROM CMS_website WHERE 
						pageid = :pageid AND cwid = :cwid', 
                array('pageid' => $pageid, 'cwid' => $cwid));
                return $sqlArray;
	}

	function insertOneCmsItem($cwid, $pageid, $cmstext){
        $postData = array(
            'pageid' => $pageid,
            'cmstext' => $cmstext
        );
        
        $this->db->update('CMS_website', $postData, "`cwid` = $cwid ");
    }
  	function insertMVPitem($idMVP, $AmountMVP, $PriceMVP, $id){
        print_r($id);
        $arr = $id.'_Array_Table';
        $postData = array(
            'DiskAmount' => $AmountMVP,
            'DiskPrice' => $PriceMVP
        );
        $this->db->update('Disk_Array_Table', $postData, "`Disk` = $idMVP ");
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