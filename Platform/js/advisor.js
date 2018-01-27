
$(document).ready(function(){
	$('#customertable').DataTable({});

	$("#age-filter-insight").ionRangeSlider({
		type: "double",
		grid: true,
		from: 0,
		to: 4,
		values: ["18", "25", "30", "40", "60+"],
	});
			
	$("#age-filter").ionRangeSlider({
		type: "double",
		grid: true,
		from: 0,
		to: 4,
		values: ["18", "25", "30", "40", "60+"],
		 onFinish: function (data) {
			var age = $("#age-filter").data("ionRangeSlider");
			var min_age = age.result.from;
			var max_age = age.result.to;

			$.ajax({  
	                url:"http://localhost/hackathon/Product/customerAPI.php",  
	                method:"GET",  
	                data:{
	                	filter:'age',
	                	min_age:min_age,
	                	max_age:max_age
	                },  
	                success:function(data){ 
	                	$('.table-responsive').html('');
	                	$('.table-responsive').html(data);
	                	$('#customertable').DataTable({});
	                }  
	           }); 
		},
	});
			
	$('#cross-sale').multiselect({});

	 $(document).on('click', '#decide-btn', function () {
	 	var age = $("#age-filter").data("ionRangeSlider");
		var min_age = age.result.from;
		var max_age = age.result.to;
		$('.table-responsive').html('');
		$('.sk-folding-cube').css('display','block');		

		$.ajax({  
	                url:"http://localhost/hackathon/Product/modelAPI.php",  
	                method:"GET",  
	                data:{
	                	filter:'age',
	                	min_age:min_age,
	                	max_age:max_age
	                },  
	                success:function(data){ 
	                	$('.table-responsive').html('');
	                	$('.table-responsive').html(data);
	                	$('.sk-folding-cube').css('display','none');	
	                	$('#customertable').DataTable({
	                		"order": [[ 8, "desc" ]]
	                	});
	                }  
	           }); 
	 });

	 $(document).on('click', '#insight-btn', function () {
	 	var age = $("#age-filter-insight").data("ionRangeSlider");
		var min_age = age.result.from;
		var max_age = age.result.to;
		var ages = [18,25,30,40,60];
		$.ajax({  
	                url:"http://localhost/hackathon/Product/factorsAPI.php",  
	                method:"GET",  
	                data:{
	                	filter:'age',
	                	min_age:min_age,
	                	max_age:max_age
	                },  
	                success:function(data){ 
	                	var res = data.split(",");
	                	$('#myInsight').html('');
	                	$('#myInsight').html('<div id="container-insighter" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>');


	                	// Build the chart
						Highcharts.chart('container-insighter', {
						    chart: {
						        plotBackgroundColor: null,
						        plotBorderWidth: null,
						        plotShadow: false,
						        type: 'pie'
						    },
						    title: {
						        text: 'Most Important Factors for Age group: ('+ages[min_age]+' - '+ages[max_age]+')'
						    },
						    tooltip: {
						        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
						    },
						    plotOptions: {
						        pie: {
						            allowPointSelect: true,
						            cursor: 'pointer',
						            dataLabels: {
						                enabled: false
						            },
						            showInLegend: true
						        }
						    },
						    series: [{
						        name: 'Brands',
						        colorByPoint: true,
						        data: [{
						            name: 'Age',
						            y: parseFloat(res[0])
						        }, {
						            name: 'Marital',
						            y: parseFloat(res[1]),
						            sliced: true,
						            selected: true
						        }, {
						            name: 'Education',
						            y: parseFloat(res[2])
						        }, {
						            name: 'Default',
						            y: parseFloat(res[3])
						        }, {
						            name: 'Balance',
						            y: parseFloat(res[4])
						        }, {
						            name: 'HHInsurance',
						            y: parseFloat(res[5])
						        }]
						    }]
						});
	                }  
	           }); 
	 });

	 Highcharts.chart('stat1', {
	    chart: {
	        type: 'area',
	        spacingBottom: 30
	    },
	    title: {
	        text: 'Customer Statistics by Age'
	    },
	    subtitle: {
	        text: '',
	        floating: true,
	        align: 'right',
	        verticalAlign: 'bottom',
	        y: 15
	    },
	    legend: {
	        layout: 'vertical',
	        align: 'left',
	        verticalAlign: 'top',
	        x: 150,
	        y: 100,
	        floating: true,
	        borderWidth: 1,
	        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
	    },
	    xAxis: {
	        categories: ['18-25', '25-35', '35-45', '45-55', '55-65', '65+']
	    },
	    yAxis: {
	        title: {
	            text: 'Amount'
	        },
	        labels: {
	            formatter: function () {
	                return this.value;
	            }
	        }
	    },
	    tooltip: {
	        formatter: function () {
	            return '<b>' + this.series.name + '</b><br/>' +
	                this.x + ': ' + this.y;
	        }
	    },
	    plotOptions: {
	        area: {
	            fillOpacity: 0.5
	        }
	    },
	    credits: {
	        enabled: false
	    },
	    series: [{
	        name: 'Car Insurance',
	        data: [2, 10, 2, 8, 1, 3]

	    }, {
	        name: 'HouseHold Insurance',
	        data: [1, 0, 3, 1, 3, 1]
	    },{
	        name: 'Health Insurance',
	        data: [0, 1, 4, 4, 5, 2]
	    }
	    ]
	});


	// Create the chart
	Highcharts.chart('stat2', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Insurance Statistics'
	    },
	    subtitle: {
	        text: 'Click the columns to view in detail.'
	    },
	    xAxis: {
	        type: 'category'
	    },
	    yAxis: {
	        title: {
	            text: 'Total percentage'
	        }

	    },
	    legend: {
	        enabled: false
	    },
	    plotOptions: {
	        series: {
	            borderWidth: 0,
	            dataLabels: {
	                enabled: true,
	                format: '{point.y:.1f}%'
	            }
	        }
	    },

	    tooltip: {
	        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
	        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
	    },

	    series: [{
	        name: 'Brands',
	        colorByPoint: true,
	        data: [{
	            name: 'Car Insurance',
	            y: 56.33,
	            drilldown: 'Car Insurance'
	        }, {
	            name: 'Health Insurance',
	            y: 24.03,
	            drilldown: 'Health Insurance'
	        }, {
	            name: 'HouseHold Insurance',
	            y: 10.38,
	            drilldown: 'HouseHold Insurance'
	        }]
	    }],
	    drilldown: {
	        series: [{
	            name: 'Car Insurance',
	            id: 'Car Insurance',
	            data: [
	                [
	                    'Make',
	                    24.13
	                ],
	                [
	                    'Model',
	                    17.2
	                ],
	                [
	                    'Colour',
	                    8.11
	                ],
	                [
	                    'Type',
	                    5.33
	                ],
	                [
	                    'Horsepower',
	                    1.06
	                ],
	                [
	                    'Manufacture Year',
	                    0.5
	                ]
	            ]
	        }, {
	            name: 'Health Insurance',
	            id: 'Health Insurance',
	            data: [
	                [
	                    'Height',
	                    5
	                ],
	                [
	                    'Weight',
	                    4.32
	                ],
	                [
	                    'Male',
	                    3.68
	                ],
	                [
	                    'Female',
	                    3.68
	                ]
	            ]
	        }, {
	            name: 'HouseHold Insurance',
	            id: 'HouseHold Insurance',
	            data: [
	                [
	                    'Type',
	                    2.76
	                ]
	            ]
	        }
	            ]
	       
	    }
	});


	Highcharts.chart('stat3', {
	    chart: {
	        type: 'line'
	    },
	    title: {
	        text: 'Calls per month'
	    },
	    subtitle: {
	        text: ''
	    },
	    xAxis: {
	        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
	    },
	    yAxis: {
	        title: {
	            text: 'Amount of calls made'
	        }
	    },
	    plotOptions: {
	        line: {
	            dataLabels: {
	                enabled: true
	            },
	            enableMouseTracking: false
	        }
	    },
	    series: [{
	        name: '2016',
	        data: [7, 6, 9, 14, 18, 21, 25, 26, 23, 18, 13, 9]
	    }, {
	        name: '2017',
	        data: [3, 4, 5, 8, 11, 15, 17, 16, 14, 10, 6, 4]
	    }]
	});
});
