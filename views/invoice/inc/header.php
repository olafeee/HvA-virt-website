<script type="text/javascript" src="/js/jquery.tablesorter.min.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<style>
th.headerSortDown { 
    background-image: url(http://tablesorter.com/themes/blue/desc.gif); 
    background-color: #CFCFCF; 
	background-repeat: no-repeat;
	background-position: center right;
	cursor: pointer;
} 
th.headerSortUp { 
    background-image: url(http://tablesorter.com/themes/blue/asc.gif); 
    background-color: #CFCFCF; 
	background-repeat: no-repeat;
	background-position: center right;
	cursor: pointer;
} 
</style>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Invoice Panel</h3>
			</div>
			<div class="list-group">
				<a href="/invoice/l30i/0" class="list-group-item">Show all invoices</a>
				<a class="list-group-item">Show by name</a>
				<a class="list-group-item">Show by date</a>
			</div>
			<div id="datepicker"></div>		
			<script type="text/javascript">
				$(function(){
				$.datepicker.setDefaults(
				$.extend($.datepicker.regional['']));
				$( "#datepicker" ).datepicker();
				$( ".selector" ).datepicker({ firstDay: 1 });
				var firstDay = $( ".selector" ).datepicker( "option", "firstDay" );
				$( ".selector" ).datepicker( "option", "firstDay", 1 );
			</script>
		</div>
	  
      <!--<div class="list-group">
      	<a href="/invoice/l30i/0" class="list-group-item">Show all invoices</a>
		<a href="/invoice/showByDate/" class="list-group-item">Show by date</a>
		<a href="/invoice/showByName/" class="list-group-item">Show by name</a>
      </div>-->
    </div>
</div> <!-- END Col 3 -->