<?php

if(isset($this->nameFound)){
	$nameFound = $this->nameFound;

	$i = 0;
	while ($i < count($nameFound)) {
		echo $nameFound[$i]['username'];
		echo '</br>';
		echo '<a href="/cmsPlaintech/managePrivileges/'.$nameFound[$i]['CSID'].'">Bekijk</a>';
		echo '</br>';
		$i++;
	}
}

?>

<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">


      <form class="form-signin" action="/cmsPlaintech/searchPrivileges" method="post">
        <input type="text" class="form-control" placeholder="firstname of lastname" required="" autofocus="" name="name">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
      </form>


  <div class="col-md-3"></div>
</div>

