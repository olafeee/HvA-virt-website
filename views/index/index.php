<?php 
$cmstext = $this->cmstext;
//print_r($cmstext);

?>
<div class="row">
	<div class="col-md-12 introColid">
	<div class="introdiv">
		<div class="introdiv_text">
			<h4 class="introdiv_text_h4">Plaintech</h4>
			<h1 class="introdiv_text_h1">Blade VPS</h1>
			<p class="introdiv_text_p">powered by Cloudstack</p>
			<br/>
			<p><a class="btn btn-primary btn-lg" role="button" href="/order">More info & order</a></p>
		</div>

		

		<div class="introdiv_text_price">
				<p class="introdiv_text_price_p">starting at</p>
				<p class="introdiv_text_price_pp">&euro;9.99/Mo</p>	
		</div>


		<img src="/img/data-center-px-png.png" class="cloud_img">
	</div>
	</div>
</div>

<div class="row">
<!-- einde van head + nav + login bij alles het zelfde-->

		<div>
			<br/>
		</div>
</div>
<div class="row introColid-push">
		<div class="col-md-4">
			<div class="index_block1">
			<div class="div-align-span-center"><h2><?php echo $cmstext[2]['cmstext'];?></h2></span></div>
			<br/>
  			<p><img src="/img/73.svg" class="fontpage-img">    <?php echo $cmstext[3]['cmstext']; ?></p>
  			<p><img src="/img/77.svg" class="fontpage-img">    <?php echo $cmstext[4]['cmstext']; ?></p>
  			<p><img src="/img/76.svg" class="fontpage-img">    <?php echo $cmstext[5]['cmstext']; ?></p>
  			<p><img src="/img/21.svg" class="fontpage-img">    <?php echo $cmstext[6]['cmstext']; ?></p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="index_block1">
  			<div class="div-align-span-center"><h2><?php echo $cmstext[7]['cmstext']; ?></h2></span></div>
  			<br>
  			<p><img src="/img/73.svg" class="fontpage-img">    <?php echo $cmstext[8]['cmstext']; ?></p>
  			<p><img src="/img/77.svg" class="fontpage-img">    <?php echo $cmstext[9]['cmstext']; ?></p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="index_block1">
  			<div class="div-align-span-center"><h2><?php echo $cmstext[10]['cmstext']; ?></h2></span></div>
  			<br>	
  			<p>    <?php echo $cmstext[11]['cmstext']; ?></p>
  			<p>    <?php echo $cmstext[12]['cmstext']; ?></p>
  			<?php print_r($_SESSION);?>
			</div>
			</div>
		</div>
</div>
