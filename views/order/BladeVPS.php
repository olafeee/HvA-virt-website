<div class="row">
<div class="SLAdiv"> 
	<!-- gedaan door oscar  design /////tabs gedaan door olaf(y)-->
	<br/>
	Inleiding:
	<br/>
	Plaintech is responsible for all incidents and failures that are related to hardware and/or network issues in the range of Plaintech.
	What the customer does on their server is their responsibility and the administration of their server. Thus, Plaintech does not offer support.
	The customer is able to get additional support packages when chosen for. The terms and conditions of the packages can be found under Service Level Agreements.
	<br/><br>
	Packages
	<br/>

	<div>
		<table border="1">
			<tr>
				<td>Package</td>
				<td>Uptime Guarentee (In percentage)</td>
				<td>Best effort response time in hours</td>
			</tr>
			<tr>
				<td>Bronze</td>
				<td>96</td>
				<td>24</td>
			</tr>
			<tr>
				<td>Silver</td>
				<td>97</td>
				<td>12</td>
			</tr>
			<tr>
				<td>Gold</td>
				<td>99.8</td>
				<td>6</td>
			</tr>
		</table>
	</div>
	<br/>
	Penalty Clause
	<br/>
	If Plaintech does not meet these conditions, response time and uptime, Plaintech will recieve a penalty as part of the agreement.
	These penalty is a refund to the customer at a certain margin. The penalty is a fee in euro's of the agreed monthly fee which the customer chose with the selection of the package.
	<br/>
	<div>
		<table border="1">
			<tr>
				<td>Penalty margin uptime</td>
				<td>Error margin best effort response time</td>
				<td>Penalty percentage</td>
			</tr>
			<tr>
				<td>5</td>
				<td>10</td>
				<td>10</td>
			</tr>
			<tr>
				<td>10</td>
				<td>20</td>
				<td>20</td>
			</tr>
			<tr>
				<td>20</td>
				<td>50</td>
				<td>40</td>
			</tr>
		</table>
	</div>
<!-- eind oscar-->
</div>
	<!--<a href="javascript:hideSLAMenu()"><img src="/img/close-img.png" id="close-img"></a>-->
</div>

<div class="col-md-5 order_summery">
	<div class="orderslider">
		<div class="order_slider"><div id="cpuslider"></div></div>
		<div class="order_slider"><div id="ramslider"></div></div>
		<div class="order_slider"><div id="DISKslider"></div></div>
		<div class="order_slider"><div id="NTslider"></div></div>
		<div class="order_slider"><div id="IPv4slider"></div></div>

		<p class="order_options_OS">Select operating system:</p>	
		<div class="order_options_OS">
			<select class="form-control" id="country" placeholder="Country">
				<optgroup label="Linux">
					<option>Ubuntu Server</option>
					<option>CentOS</option>
						<option>Debian</option>
					<option>Arch linux</option>
				</optgroup>
				<optgroup label="Windows + &euro; 7,50">
					<option>Windows Server 2008</option>
					<option>Windows Server 2008 R2</option>
					<option>Windows Server 2013</option>
				</optgroup>
			</select>
		</div>
		<p class="order_options_OS">Select Service Level Argrement:</p>
		<div class="order_options_OS">
			<input type="radio" name="a" value="1" onchange="SLAradio(1)"> Bronze<br>
			<input type="radio" name="a" value="2" onchange="SLAradio(2)"> Silver<br>
			<input type="radio" name="a" value="3" onchange="SLAradio(3)"> Gold<br>
			<a href="javascript:showSLAMenu()" class="sla_ms">more info</a>

		</div>
	</div>
	<div class="orderslider-right">
		<div class="order_change"><div class="changeCPU"></div></div>
		<div class="order_change"><div class="changeRAM"></div></div>
		<div class="order_change"><div class="changeDISK"></div></div>
		<div class="order_change"><div class="changeNT"></div></div>
		<div class="order_change"><div class="changeIPv4"></div></div>	

	</div>
</div>
<div class="col-md-1"></div>
<div class="col-md-5 order_summery">
	<h2>Your configuration</h2>
	<div class="divROWorderTop"></div>
	<div id="totalorderCostDIV"><h4>Server cost</h4></div><div class="totalorderCostDIV_right"><h4 class="totalorderCost"></h4></div>	
		<div id="totalorderCostDIV"></div><div class="totalorderCostDIV_right"></div>
			<div id="totalorderCostDIV">CPU cores</div><div class="totalorderCostDIV_right"><div class="changeCPU"></div></div>
			<div id="totalorderCostDIV">Memory</div><div class="totalorderCostDIV_right"><div class="changeRAM"></div></div>
			<div id="totalorderCostDIV">Disk space</div><div class="totalorderCostDIV_right"><div class="changeDISK"></div></div>
			<div id="totalorderCostDIV">Network traffic</div><div class="totalorderCostDIV_right"><div class="changeNT"></div></div>
			<div id="totalorderCostDIV">IPv4 addresses</div><div class="totalorderCostDIV_right"><div class="changeIPv4r"></div></div>
			<div id="totalorderCostDIV">IPv6 addresses</div><div class="totalorderCostDIV_right">unlimited</div>
			<div id="totalorderCostDIV">Snapshot</div><div class="totalorderCostDIV_right">1</div>
			<div id="totalorderCostDIV"></div><div class="totalorderCostDIV_right"></div>

		<div class="divROWorderTop"></div>
		
			<div id="totalorderCostDIV"></div><div class="totalorderCostDIV_right"></div>
			<div id="totalorderCostDIV"><h4>Software</h4></div><div class="totalorderCostDIV_right"><h4 class="softwarePrice"></h4></div>
			<div id="totalorderCostDIV"></div><div class="totalorderCostDIV_right"></div>
			<div id="totalorderCostDIV">
				<div class="changeOS"></div>
			</div>
			<div class="totalorderCostDIV_right"><div class="softwarePrice"></div></div>
			<div id="totalorderCostDIV"></div><div class="totalorderCostDIV_right"></div>
		
		<div class="divROWorderTop"></div>

			<div id="totalorderCostDIV"></div><div class="totalorderCostDIV_right"></div>
			<div id="totalorderCostDIV"><h4>Services</h4></div><div class="totalorderCostDIV_right"><h4 class="servicePrice"></h4></div>
			<div id="totalorderCostDIV"></div><div class="totalorderCostDIV_right"></div>
			<div id="totalorderCostDIV"><div class="changeSLAradio"></div></div><div class="totalorderCostDIV_right"><div class="servicePrice"></div></div>

		<div id="totalorderCostDIV"><h4>Monthly Fee</h4></div><div class="totalorderCostDIV_right"><h4 class="totalPrice"></h4></div>	
<div class="col-md-1">		
	<form  action="/order/addToShoppingCart" method="post">
			<input type="hidden" id="hiddenChangeCPU" name="CPUvalue"/>
			<input type="hidden" id="hiddenChangeRAM" name="RAMvalue" />
			<input type="hidden" id="hiddenChangeDISK" name="DISKvalue" />
			<input type="hidden" id="hiddenChangeNT" name="NTvalue" />
			<input type="hidden" id="hiddenChangeIPv4" name="IPv4value" />
			<input type="hidden" id="hiddenChangeOS" name="OSvalue"/>
			<input type="hidden" id="hiddenChangeSLA" name="SLAvalue"/>
			<input type="hidden" id="hiddenChangePrice" name="TPvalue"/>
			 <button class="btn btn-lg btn-primary btn-block order-button" type="submit">Order</button>
		</form></div>
</div>

</div>
