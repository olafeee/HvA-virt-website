<?php

class indexModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
		$this->conDB();
		echo"text";
	}

	function getIndex(){
		$page = "1";
				$sql = $this->db->prepare("SELECT *
										FROM CMS_website
										WHERE page = $page");
			    $st = $this->$db->prepare( $sql );
			    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
			    $st->execute();
			    $list = array();
			 
			    while ( $row = $st->fetch() ) {
			      $article = new Article( $row );
			      $list[] = $article;
			    }
			 
			    // Now get the total number of articles that matched the criteria
			    $sql = "SELECT FOUND_ROWS() AS totalRows";
			    $totalRows = $conn->query( $sql )->fetch();
			    $conn = null;
			    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );

	}


}
?>