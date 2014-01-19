<?php

/**
* 
*/
class loginModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
		echo"ik doe het wel maar ook niet";
	}

	function getValue($table){
			    $sqlArray = $this->db->selectAll("SELECT * FROM $table");
                return $sqlArray;
	}

}

?>
	<script type="text/javascript">
	$(document).ready(function(){
	    var myArray = <?php print(json_encode($pages)); ?>;
	    console.log(myArray["cwid"])
	    alert(myArray[0][cwid]);
	});
	</script>