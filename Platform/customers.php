<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Customers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/loading.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.skinNice.css" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>
</head>

<body>
	<div class="container-fluid myContainer">
		<div class="row myRow">
			<div class="col-md-2 sidebar">
			<img src="img/advisor_logo.png" width="100%" height="auto" alt="advisor logo" class="alogo">
			<div class="vertical-menu">
			  <a href="overview.php">Overview</a>
			  <a href="insight.php">Insight</a>
			  <a href="customers.php" class="active">Customers</a>
			  <a href="behavior.php">Behavioral Analysis</a>
			</div></div>

			<!-- The Modal -->
			<div id="modal" class="modal">
			  <!-- Modal content -->
			  <div class="modal-content">
			    <span id="close-modal" class="close">&times;</span>
			    <div class="row">
			    	<div class="col-md-4">
			    		<img src="img/person.jpg" width="80%" height="auto">
			    	</div>
			    	<div class="col-md-8">
			    		<table class="table" style="width:100%">
			    			<h3>Info:</h3>
							  <tr>
							    <th>Name:</th>
							    <td>Light</td>
							  </tr>
							  <tr>
							    <th>Surname:</th>
							    <td>Yagami</td>
							  </tr>
							  <tr>
							    <th>Telephone:</th>
							    <td>555 77 855</td>
							  </tr>
						</table>
						<table class="table" style="width:100%">
							<h3>Generated Intelligence:</h3>
							<tr>
							    <th>Prefered contact media:</th>
							    <td>Facebook Chat</td>
							  </tr>
							  <tr>
							    <th>Prefered contact time:</th>
							    <td>15:00 - 18:00</td>
							  </tr>
						</table>
			    	</div>
			    </div>
			  </div>
			</div>

			<div class="col-md-10 content">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Filters</h3></div>
					<div class="panel-body">
						<div class="col-md-2">
						<h5>Age Range</h5>
							<input type="text" id="age-filter" name="age-filter" value="" />
						</div>
						<div class="col-md-2">
							<h5>Marital Status</h5>
							<select class="form-control" name="marital">
								<option value="single">Single</option>
								<option value="divorced">Divorced</option>
								<option value="married">Married</option>
							</select>
						</div>
						<div class="col-md-2">
						<h5>Education</h5>
							<select class="form-control" name="Education">
								<option value="primary">Primary</option>
								<option value="secondary">Secondary</option>
								<option value="tertiary">Tertiary</option>
							</select>
						</div>
						<div class="col-md-2">
							<h5>Balance</h5>
							<select class="form-control" name="Balance">
								<option value="1">€0 - €1.000</option>
								<option value="2">€1.000 - €10.000</option>
								<option value="3">€10.000 - €50.000</option>
								<option value="4">€50.000 - €100.000</option>
								<option value="5">> €100.000</option>
							</select>
						</div>
						<div class="col-md-4">
							<h5>Looking For</h5>
						  		<select class="form-control selectpicker" name="cross-sale[]" id="cross-sale" multiple="multiple">		<option value="Household">Household</option>
									<option value="Health">Health</option>
									<option value="Car Insurance">Car Insurance</option>		  
								</select>
						  <button type="button" id="decide-btn" class="btn btn-default btn-lg">
							  <span class="glyphicon" aria-hidden="true"></span> Decide
							</button>
							
						</div>

					</div>
				</div>
				
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Customers</h3></div>
					<div class="panel-body">
						<div class="sk-folding-cube" style="display: none;">
						  <div class="sk-cube1 sk-cube"></div>
						  <div class="sk-cube2 sk-cube"></div>
						  <div class="sk-cube4 sk-cube"></div>
						  <div class="sk-cube3 sk-cube"></div>
						</div>
						<div class="table-responsive">
							<table id="customertable">
								<thead>
									<th>#</th>
									<th>Age</th>
									<th>Job</th>
									<th>Marital</th>
									<th>Education</th>
									<th>Default Credit</th>
									<th>Balance</th>
									<th>Household Insurance</th>
									<th>Car Insurance</th>
									<th>Get in touch</th>
								</thead>
								<tbody>
									<?php 
										$row = 1;
									    $customers = [];
									    if (($handle = fopen("data\carInsurance_test.csv", "r")) !== FALSE) {
									        while (($data = fgetcsv($handle, 100000, ",")) !== FALSE) {
									            if($row!=1){              
									              $customer= array("id"=>$data[0],"age"=>$data[1],"job"=>$data[2],"marital"=>$data[3],"education"=>$data[4],"default"=>$data[5],"balance"=>(float)$data[6],"hhinsurance"=>$data[7],"carlaon"=>$data[8],"communication"=>$data[9],"lastcontactday"=>$data[10],"lastcontactmonth"=>$data[11],"noofcontacts"=>$data[12],"dayspassed"=>$data[13],"prevattempts"=>$data[14],"outcome"=>$data[15],"callstart"=>$data[16],"callend"=>$data[17],"carinsurance"=>(int)$data[18]); ?>
									              <tr>
									              	<td><?=$customer['id']?></td>
									              	<td><?=$customer['age']?></td>
									              	<td><?=$customer['job']?></td>
									              	<td><?=$customer['marital']?></td>
									              	<td><?=$customer['education']?></td>
									              	<td><?=$customer['default']?></td>
									              	<td><?=$customer['balance']?></td>
									              	<td><?=$customer['hhinsurance']?></td>
									              	<td><?=$customer['carinsurance']?></td>
									              	<td><button class="btn btn-default" onclick="modalBtn()">Get in touch</button></td>
									              </tr>
									              <?php
									            }
									            $row ++;
									        }
									        fclose($handle);
									    }
									?>
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

    </body>
</html>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="js/advisor.js" type="text/javascript"></script>

	<script type="text/javascript">
		// When a chart button is clicked open the respective modal
		function modalBtn(){
			// Get the <span> element that closes the modal
			var spanID = 'close-modal';
			var span = document.getElementById(spanID);

			var modalID = 'modal';
			// Get the modal
			var modal = document.getElementById(modalID);
			modal.style.display = "block";

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			    modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			    if (event.target == modal) {
			        modal.style.display = "none";
			    }
			}
		}
	</script>

