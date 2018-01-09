/*-- Chart JS 




*/


var updateChartValue = 0;
var lastTimeUpdateChartValue;
var lastTimeUpdateCalculatorValue;


function checktime(){
	
	if(lastTimeUpdateCalculatorValue+2 < new Date.now){
		
		console.log("show time: "+new Date.now);
		
	}
	
	
	
}

function updateChartData(total_gain){
	
	var now = new Date.now();
	
	if(updateChartValue == 0){
		
		updateChartValue = 1;
		
		if((now - lastTimeUpdateChartValue) < 2){
			
			setTimeout(function() {
			  
			  window.myBar.data.datasets[0].data = total_gain;
			  window.myBar.update();
			  updateChartValue = 0;
			  
			}, 1000);
			
		}else{
			
			window.myBar.data.datasets[0].data = total_gain;
			window.myBar.update();
			updateChartValue = 0;
			
		}
		
	}
	
}




        var barChartData = {
            labels: ["Year 0", "Year 1", "Year 2", "Year 3", "Year 4", "Year 5"],
            datasets: [{
                label: 'Dataset 1',
                backgroundColor: window.chartColors.red,
                data: [
                    10,
                    15,
                    25,
                    30,
                    35,
                    40
                ]
            }, {
                label: 'Dataset 2',
                backgroundColor: window.chartColors.blue,
                data: [
                    2,
                    3,
                    4,
                    5,
                    6,
                    7
                ]
            }, {
                label: 'Dataset 3',
                backgroundColor: window.chartColors.green,
                data: [
                    3,
                    4,
                    6,
                    8,
                    10,
                    12
                ]
            }]

        };
		
		
        window.onload = function() {
            var ctx = document.getElementById("chart").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
					
                    title:{
                        display:true,
                        text:"Assumptions"
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
							maxBarThickness:40,
                        }],
                        yAxes: [{
                            stacked: true,
							maxBarThickness:40,
                        }]
                    }
                }
            });
        };

