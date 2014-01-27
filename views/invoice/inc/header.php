<script type="text/javascript" src="/js/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="/js/jquery.tablesorter.pager.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script type="text/javascript">
	$(function() {
		$("table")
			.tablesorter({widthFixed: true, widgets: ['zebra']})
			.tablesorterPager({container: $("#pager")});
	});
	</script>
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
.ui-datepicker {
	width: 100%;
}
.viewPageTable {
    width: 100%;
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
				<br /><br /><div class="input-group">
				<input type="text" name="name" id="name" class="form-control" placeholder="Customer Name">
				<span class="input-group-btn"><button id="custName" class="btn btn-default" type="button">Show</button></span>
				</div><br /><br />
			</div>
			<div id="datepicker"></div>		
			<script type="text/javascript">
				$(function() {
					$("#datepicker").datepicker({
						dateFormat: "yy-mm-dd",
						onSelect: function(dateText, inst) {
							var date = $.datepicker.parseDate(inst.settings.dateFormat || $.datepicker._defaults.dateFormat, dateText, inst.settings);
							var dateText1 = $.datepicker.formatDate("yy-mm-dd", date, inst.settings);
							document.location.href = "/invoice/showByDate/" + dateText;
						}
					});
				});
				
				$("#custName").on('click', function(){
					var custName1 = document.getElementById('name').value;
					document.location.href = "/invoice/showByName/" + custName1; 
				});
			</script>
		</div>
	  
      <!--<div class="list-group">
      	<a href="/invoice/l30i/0" class="list-group-item">Show all invoices</a>
		<a href="/invoice/showByDate/" class="list-group-item">Show by date</a>
		<a href="/invoice/showByName/" class="list-group-item">Show by name</a>
      </div>-->
    <!--</div>-->
</div> <!-- END Col 3 -->