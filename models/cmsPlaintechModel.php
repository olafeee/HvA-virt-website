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
        $arr = $id.'_Array_Table';
        $x = $id[0]."ID";
        echo $x;
        $postData = array(
            $id.'Amount' => $AmountMVP,
            $id.'Price' => $PriceMVP
        );
 		echo "<br/>";
		echo $arr;
		echo "<br/>";
		print_r($postData);
		echo "<br/>";
		echo $x;
		echo "<br/>";
		echo $idMVP;

        $this->db->update($arr, $postData, "`$x` = $idMVP ");
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

	function loadRole($pageid){
			    $sqlArray = $this->db->select('SELECT rol_id FROM CMS_pages_rollen WHERE 
						pageid = :pageid', 
                array('pageid' => $pageid));
                return $sqlArray;
	}

	function getUserByName($search){
	    $sqlArray = $this->db->select('SELECT * FROM CSUsers WHERE 
				firstname = :firstname OR lastname = :lastname', 
        array('lastname' => $search,
        	'firstname' => $search));
        return $sqlArray;
	}

	function managePrivileges($CSID){
				$sqlArray = $this->db->select('SELECT * 
													FROM privileges
													INNER JOIN CSUsers
													ON CSUsers.CSID = privileges.CSID
													INNER JOIN rollen
													ON rollen.rol_id = privileges.rol_id
													WHERE privileges.CSID = :CSID', 
                									array('CSID' => $CSID));
                return $sqlArray;
	}

	function deletePrivileges($CSID, $rol_id){ 
	        $this->db->delete('privileges', "`CSID` = {$CSID} AND rol_id = '{$rol_id}'");        
	}

}
?>