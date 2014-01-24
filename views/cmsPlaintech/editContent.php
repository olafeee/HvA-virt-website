
<?php
$value = $this->editContenVar;
print_r($value);
$test = $value[0];
?>

<?php require 'inc/header.php'; ?>


<div class="tab-pane">
  <div class="col-md-9" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Virtual Machine Panel</h3>
      </div>
      <div class="panel-body">
		<div class="viewPageTable">
<form name="input" action="/cmsPlaintech/insertContent/" method="post">
	<input type="text" name="cmstext" value="<?php echo $value[0]['cmstext']; ?>">
	<input type="text" name="pageid" value="<?php echo $value[0]['pageid']; ?>">
	<input type="hidden" name="cwid" value="<?php echo $value[0]['cwid']; ?>">
	<input type="submit" value="Submit">
</form>
	</div>
      </div>
    </div>
  </div><!-- END Col 9 -->
</div>