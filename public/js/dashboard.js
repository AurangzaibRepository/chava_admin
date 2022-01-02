$(function(){

    // Load activity chart
    RenderActivityChart();
});

// Function to load activitu chart
function RenderActivityChart(){
    Highcharts.chart('dv-activity', {
        chart: {
            type: 'column',
            spacing: [25, 25, 25, 25]
        },
        title: {
            text: 'Activity',
            align: 'left',
            style: {
                fontSize: '14px'
            }
        },
        xAxis: {
            categories: [
                'New Visitors',
                'Active Users',
                'Inactive Users',

            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                enabled: false
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },

        },
        credits: {
            enabled: false
        },
        series: [{
            showInLegend: false,
            name: 'Tokyo',
            data: [130, 45, 60]
    
        }]
    });
}