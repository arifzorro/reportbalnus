
function createConfig(position) {
    return {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'My First dataset',
                borderColor: window.chartColors.red,
                backgroundColor: window.chartColors.red,
                data: [10, 30, 46, 2, 8, 50, 0],
                fill: false,
            }, {
                label: 'My Second dataset',
                borderColor: window.chartColors.blue,
                backgroundColor: window.chartColors.blue,
                data: [7, 49, 46, 13, 25, 30, 22],
                fill: false,
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Tooltip Position: ' + position
            },
            tooltips: {
                position: position,
                mode: 'index',
                intersect: false,
            },
        }
    };
}

window.onload = function() {
    var container = document.querySelector('.container');

    ['average', 'nearest'].forEach(function(position) {
        var div = document.createElement('div');
        div.classList.add('chart-container');

        var canvas = document.createElement('canvas');
        div.appendChild(canvas);
        container.appendChild(div);

        var ctx = canvas.getContext('2d');
        var config = createConfig(position);
        new Chart(ctx, config);
    });
};
