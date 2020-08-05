const chart = Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Técnicos más activos'
    },
    xAxis: {
        categories: [ ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'ordenes de trabajo atendidas'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [ ]
});

function fetchData(){
        fetch('/reportes/tecnicos/columna/data')
         .then(function(response){
             return response.json();
         })
          .then(function(data){ 
              //console.log(data); 
            chart.xAxis[0].setCategories(data.categories);

            if(chart.series.length > 0){
                chart.series[1].remove();
                chart.series[0].remove();
            }
            chart.addSeries(data.series[0]); //Atendida
            chart.addSeries(data.series[1]); //Cancelada
          });
}
$(function(){
    fetchData();
});


