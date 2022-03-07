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
            shared: true,
            useHTML: true,
            formatter: function() {
                return `
                <table>
                <tr>
                    <td><span style="font-size: 11px">${this.x}: </span><b>${this.y}</b></td>
                </tr>
                </table>
                `;
            }
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
            data: [130, 45, 60]
    
        }]
    });
}