<?php 
$cmstext = $this->cmstext;
//print_r($cmstext);

?>
<div class="row">
	<div class="col-md-12">
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
<div class="row">
		<div class="col-md-4">
			<div class="index_block1">
			<div class="div-align-span-center"><h2>Our systems</h2></span></div>
			<br/>
  			<p><img src="/img/73.svg" class="fontpage-img">    <?php echo $cmstext[3]['cmstext']; ?></p>
  			<p><img src="/img/77.svg" class="fontpage-img">    <?php echo $cmstext[4]['cmstext']; ?></p>
  			<p><img src="/img/76.svg" class="fontpage-img">    User friendly environment</p>
  			<p><img src="/img/21.svg" class="fontpage-img">    Engineering is in our DNA</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="index_block1">
  			<div class="div-align-span-center"><h2>Quality</h2></span></div>
  			<br>
  			<p><img src="/img/73.svg" class="fontpage-img">    We assure the best customer care!</p>
  			<p><img src="/img/77.svg" class="fontpage-img">    We use the best quality blade servers for efficiency!</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="index_block1">
  			<div class="div-align-span-center"><h2>Green IT</h2></span></div>
  			<br>
  			<p>    Our servers are build and designed for Green IT</p>
  			<p>    The entire Plaintech infrastructure is designed for the enviroment</p>
  			<?php print_r($_SESSION);?>
			</div>
			</div>
		</div>
</div>
