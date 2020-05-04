                // Gráfico de Barras
$('document').ready(function () {
    $.ajax({
        type: "GET",
        url: "/teste",
        dataType: "json",
        success: function (response) {
            var notaarray = [];
            var namearray = [];

            for (var i = 0; i < response.length; i++) {

                notaarray.push(response[i].total);
                namearray.push(response[i].name);
                grafico(notaarray, namearray);
            }

        }
    });
})

function grafico(notaarray, namearray) {

    var barras = document.getElementById('myChart').getContext('2d');
    var barrasChart = new Chart(barras, {
        type: 'bar',
        data: {
            labels: namearray,
            datasets: [{
                label: 'Nota',
                data: notaarray,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}

                    // GRÁFICO GAUGE
$('document').ready(function () {
    $.ajax({
        type: "GET",
        url: "/exemplo",
        dataType: "json",
        success: function (response) {
            var notaarray = [];

            for (var i = 0; i < response.length; i++) {

                notaarray.push(response[i].total);
                gauge(notaarray);
            }

        }
    });
})

function gauge(notaarray) {
    var opts = {
        angle: 0, // The span of the gauge arc
        lineWidth: 0.19, // The line thickness
        radiusScale: 1, // Relative radius
        pointer: {
            length: 0.6, // // Relative to gauge radius
            strokeWidth: 0.02, // The thickness
            color: '#000000' // Fill color
        },
        limitMax: false,     // If false, max value increases automatically if value > maxValue
        limitMin: false,     // If true, the min value of the gauge will be fixed
        colorStart: '#51CF51',   // Colors
        colorStop: '#DA1A41',    // just experiment with them
        strokeColor: '#000000',  // to see which ones work best for you
        generateGradient: true,
        highDpiSupport: true,     // High resolution support
        // renderTicks is Optional
        staticZones: [
            {strokeStyle: "#F03E3E", min: 0, max: 40}, // Red from 100 to 130
            {strokeStyle: "#FFDD00", min: 41, max: 70}, // Yellow
            {strokeStyle: "#30B32D", min: 71, max: 100}, // Green
        ],
        staticLabels: {
            font: "10px sans-serif",  // Specifies font
            labels: [10, 40, 70, 100],  // Print labels at these values
            color: "#fcf6fc",  // Optional: Label text color
            fractionDigits: 0  // Optional: Numerical precision. 0=round off.
        },

        renderTicks: {
            divisions: 5,
            divWidth: 1.6,
            divLength: 0.47,
            divColor: '#333333',
            subDivisions: 4,
            subLength: 0.55,
            subWidth: 0.1,
            subColor: '#656666'
        },


    };

    var target = document.getElementById('myChart2'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
        gauge.maxValue = 100; // set max gauge value
        gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
        gauge.animationSpeed = 32; // set animation speed (32 is default value)
        gauge.set(notaarray); // set actual value

}



// Gráfico de linha
$('document').ready(function () {
    $.ajax({
        type: "GET",
        url: "/diario",
        dataType: "json",
        success: function (response) {
            var docarray = [];
            var dataarray = [];

            for (var i = 0; i < response.length; i++) {

                docarray.push(response[i].NumDocumentos);
                dataarray.push(response[i].DATE);
                linhas(docarray, dataarray);
            }

        }
    });
})

function linhas(docarray, dataarray) {

    var linhas = document.getElementById('line-chart').getContext('2d');
    var linhaschart = new Chart(linhas, {
        type: 'line',
        data: {
            labels: dataarray,
            datasets: [{
                data: docarray,
                label: "Documentos",
                borderColor: "#3e95cd",
                fill: false
            },
            ]
        },
        options: {
            title: {
                display: false,
                text: 'Novos Documentos Inseridos Por Dia'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        stepSize: 1
                    }
                }]
            }
        }
    });
}





                // // GRÁFICO GAUGE 2
$('document').ready(function () {
    $.ajax({
        type: "GET",
        url: "/exemplo",
        dataType: "json",
        success: function (response) {
            var notaarray = [];

            for (var i = 0; i < response.length; i++) {

                notaarray.push(response[i].total);
                gauge2(notaarray);
            }

        }
    });
})

function gauge2(notaarray) {
    var opts = {
        angle: 0, // The span of the gauge arc
        lineWidth: 0.19, // The line thickness
        radiusScale: 1, // Relative radius
        pointer: {
            length: 0.6, // // Relative to gauge radius
            strokeWidth: 0.02, // The thickness
            color: '#000000' // Fill color
        },
        limitMax: false,     // If false, max value increases automatically if value > maxValue
        limitMin: false,     // If true, the min value of the gauge will be fixed
        colorStart: '#51CF51',   // Colors
        colorStop: '#DA1A41',    // just experiment with them
        strokeColor: '#000000',  // to see which ones work best for you
        generateGradient: true,
        highDpiSupport: true,     // High resolution support
        // renderTicks is Optional
        staticZones: [
            {strokeStyle: "#F03E3E", min: 0, max: 40}, // Red from 100 to 130
            {strokeStyle: "#FFDD00", min: 41, max: 70}, // Yellow
            {strokeStyle: "#30B32D", min: 71, max: 100}, // Green
        ],
        staticLabels: {
            font: "10px sans-serif",  // Specifies font
            labels: [40, 70, 100],  // Print labels at these values
            color: "#fcf6fc",  // Optional: Label text color
            fractionDigits: 0  // Optional: Numerical precision. 0=round off.
        },

        renderTicks: {
            divisions: 5,
            divWidth: 1.6,
            divLength: 0.47,
            divColor: '#333333',
            subDivisions: 4,
            subLength: 0.55,
            subWidth: 0.1,
            subColor: '#656666'
        },


    };

    var target2 = document.getElementById('myChart3'); // your canvas element
    var gauge2 = new Gauge(target2).setOptions(opts); // create sexy gauge!
    gauge2.maxValue = 100; // set max gauge value
    gauge2.setMinValue(0);  // Prefer setter over gauge.minValue = 0
    gauge2.animationSpeed = 32; // set animation speed (32 is default value)
    gauge2.set(notaarray); // set actual value

}
//
//
// // ############################## LISTAS ###########################################
//
    function getListStats(table_id, date){
        var data = table_id.replace('table_', '');
        $.ajax({
            url: '/stats/',
            dataType: 'json',
            success: function (response) {
                var html = '';
                $.each(response, function(nome, visits){
                    html += '<tr>';
                    html += '   <td>' + nome + '</td>';
                    html += '   <td class="text-right">' + visits + '<td>';
                    html += '<tr>';
                });
                $('#' + table_id).html(html);
            }
        })
    }

    /**
     * Evento do botão para chamar a API
     */
    $(".list").click(function(){
        var str = $(this).attr('id').replace('list_', '');
        var params = str.split('_');
        console.log(params);
        getListStats('table_' + params[0], params[1]);
    });

    getListStats('table_code', 'today');
//


                // ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange']
                // [12,14,16,18,20,22,24,26,28,30,32,34]
