<?php

class Order extends baseController {

	public $model;
	public $db;
	public $DISK;
	
	function __construct() {
		parent::__construct();
		// laad model in & selecteer database
		$this->model = $this->laadModel();
		$this->db = $this->model->conDB1();
		$this->DISK = $this->model->getValue('Disk_Array_Table');
		echo "<pre>";
	print_r(get_defined_vars());
		echo "</pre>";

		echo 
		'<script type="text/javascript">
			$(document).ready(function(){
	    	var myArray = '.print(json_encode($this->DISK)).';
	    	console.log(myArray)
    		alert(myArray);
			});
		</script>';
	}

	function BladeVPS($value){
		$this->index('BladeVPS');
	}

	public $shoppingcart = [];


	function addToShoppingCart(){
		$pid = $this->genaratePID();
		$cpuarray = array(1, 2, 3, 4, 5, 6, 8, 10, 12, 16);
		$ramarray = array(512,1024,2048,3096,4096,6144,8192,12288,16384,24576,32768);
		$diskarray = array(20,30,40,60,80,120,160,320,500,640,960,1400);
		$NTarray = array("2000 GB", "4000 GB", "8000 GB","unlimited");
		$q = array(
				'CPU' => 	$cpuarray[$_POST['CPUvalue']],
				'RAM' =>  	$ramarray[$_POST['RAMvalue']],
				'DISK' => 	$diskarray[$_POST['DISKvalue']],
				'NT' =>		$NTarray[$_POST['NTvalue']],
				'IPv4' =>	$_POST['IPv4value'] +1,
				'OS' =>	$_POST['OSvalue'],
				'SLA' =>	$_POST['SLAvalue'],
				'TP' =>	$_POST['TPvalue']
				);
		@session_start();
	 
		if(is_array($_SESSION['cart'])){
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['productid']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
		}
		else{
			$_SESSION['cart']=[];
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
		}

		header('location: /shoppingbasket');
	}

	function genaratePID(){
		$pid = "";
    	$pid_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
    	for($i=0; $i < 20; $i++) {
     		 $pid .= $pid_chars[array_rand($pid_chars)];
    	}

    	return $pid;
	}

	function remove_product($pid){
		@session_start();
		unset($_SESSION['cart'][$pid]);
		echo"is unsset";
		$this->reOrderArray();
		header('location: /shoppingbasket');
	}

	function reOrderArray(){
		@session_start();
		$_SESSION['cart'] = array_values($_SESSION['cart']);
		return true;
		
	}
		

		/*$pid=intval($pid);
		$max=count(Session::get('cart'));
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				unset($_SESSION['cart'][$i]);
				echo"is unsset";
				break;
			}
		}
		//Session::get('cart')=array_values(Session::get('cart'));*/
	

}
?>


