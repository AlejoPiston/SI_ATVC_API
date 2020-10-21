$(function(){

    
//
// Bars chart
//

var BarsChart = (function() {

	//
	// Variables
	//

	var $chart = $('#chart-bars');


	//
	// Methods
	//



// Init chart
function initChart($chart) {

    // Create chart
    var ordersChart = new Chart($chart, {
        type: 'bar',
        data: {
            labels: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sab',],
            datasets: [{
                label: 'Órdenes de Trabajo',
                data: ots_por_dia
            }]
        }
    });

    // Save to jQuery object
    $chart.data('chart', ordersChart);
}


// Init chart
if ($chart.length) {
    initChart($chart);
}

})();
});

