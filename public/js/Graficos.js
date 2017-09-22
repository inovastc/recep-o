$(function () {
    $('#graficoPizza').highcharts({});
    var graficoPizza = Highcharts.chart('graficoPizza', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Indicadores de Atendimento Por Serviço'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
                name: 'Porcentagem',
                colorByPoint: true,
                data: [{
                        name: document.getElementById('nome1').value,
                        y: +document.getElementById('quantidade1').value,
                        sliced: true,
                        selected: true
                    }, {
                        name: document.getElementById('nome2').value,
                        y: +document.getElementById('quantidade2').value,
                    }, {
                        name: document.getElementById('nome3').value,
                        y: +document.getElementById('quantidade3').value
                    }]
            }]
    });
});