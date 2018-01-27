<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Behavioral Analysis</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
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
				<img src="advisor_logo.svg" alt="advisor logo" class="alogo">
				<div class="vertical-menu">
				  <a href="overview.php">Overview</a>
				  <a href="insight.php">Insight</a>
				  <a href="customers.php">Customers</a>
				  <a href="behavior.php"  class="active">Behavioral Analysis</a>
				</div>
			</div>

			<div class="col-md-10 content">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading"><h3>What is it?</h3></div>
						<div class="panel-body">
							<p>
								An intelligent system that monitors excisting customers and their friends on social media, to create
								a behaviorial model of the users. This system will use deep learning with a convolutional
								neural network to analyze the data and extract value from them. It will be able to detect objects
								in the images uploaded by the user and recommend the appropriate insurance plans. 
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading"><h3>What we need to do:</h3></div>
						<div class="panel-body">
							<div class="col-md-7">
								<ul>
									<li><h5>Monitor our customers and their friends on Social media through APIs</h5>
										<ul>
											<li>e.g. <a href="https://developer.twitter.com/en/docs">https://developer.twitter.com/en/docs</a> </li>
										</ul>
									</li>
									<li><h5>Build deep learning neural networks with the use of flexible frameworks</h5>
										<ul>
											<li>e.g. <a href="https://www.tensorflow.org/">https://www.tensorflow.org/</a> </li>
										</ul>
									</li>
									<li><h5>Utilize data to propose suiting insurance plans to current or new customers</h5>
										<ul>
											<li>e.g. After analyzing photos of the user, the neural network discovers a new car and
											prepares a car insurance plan proposition to later forward to the potential customer</li>
										</ul>
									</li>
								</ul>
								
								
							</div>
							<div class="col-md-5"><img src="img/neural.gif" width="100%" height="auto"></div>
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
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/drilldown.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="js/advisor.js" type="text/javascript"></script>
