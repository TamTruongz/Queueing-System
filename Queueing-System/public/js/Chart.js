

var ctx = document.getElementById('myChart').getContext('2d');
var gradient = ctx.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, '#5185F7');
gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: '',
            data: counts,
            backgroundColor: gradient,
            borderColor: '#5185F7',
            pointBorderColor: '#fff',
            pointBorderWidth: 1,
            pointRadius: 4,
            fill: true,
            borderCapStyle: 'round',
            borderJoinStyle: 'round'   
        }]
    },
    options: {
        scales: {
            xAxes: [{
                gridLines: {
                    display: false
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                }
            }],
        },
        legend: {
            display: true
        }
    }
});