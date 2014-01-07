	<?php
	function addToShoppingCart1(){
	$pid = 21;
	$q = array(
			'CPU' => "1",
			'RAM' =>  "5212");;
	@session_start();
	if($pid<1 or $q<1) return;
 
	if(is_array($_SESSION['cart'])){
		$max=count($_SESSION['cartcounter']);
		$_SESSION['cartcounter']=$max;
		$_SESSION['cart'][$max]['productid']=$max++;
		$_SESSION['cart'][$max]['qty']=$q;
	}
	else{
		$_SESSION['cart']=array();
		$_SESSION['cartcounter']=0;
		$_SESSION['cart'][0]['productid']=0;
		$_SESSION['cart'][0]['qty']=$q;
	}
		
		/*
		$this->shoppingcart =	array("rose", 1.25 , 15),
               array("daisy", 0.75 , 25),
               array("orchid", 1.15 , 7) 
             );
		Session::init();
		Session::set('shoppingcart', $this->shoppingcart);
		*/
	
	}

	?>