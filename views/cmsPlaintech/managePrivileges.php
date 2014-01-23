<?php

$nameFound = $this->nameFound;


print_r($nameFound);
?>

<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">


      <form class="form-signin" action="/cmsPlaintech/managePrivileges" method="post">
        <input type="text" class="form-control" placeholder="firstname of lastname" required="" autofocus="" name="name">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
      </form>


  <div class="col-md-3"></div>
</div>
