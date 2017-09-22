<?php
$sql = "SELECT 
                        c.nome as nome, count(c.nome) as quantidade
                    FROM
                        servico s, categoria c
                    WHERE
                        s.categoria = c.codigo 
                    GROUP BY
                        c.nome";
$p_sql = Conexao::getInstance()->prepare($sql);
$p_sql->execute();
$p_sql->fetchAll();
while ($row = $p_sql->fetch(PDO::FETCH_ASSOC)) {
    $data[] = array($row['nome'], hexdec($row['quantidade']));
}

$jSon = json_encode($data);
?>

<html>
    <head>
        <title>Gráfico Pizza</title>
        {{include ('Head.html')}} 
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script type="text/javascript">            
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
        text: 'Indicadores de Atendimento'
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
        name: 'Brands',
                colorByPoint: true,
                data: [{
                name: 'Microsoft Internet Explorer',
                        y: 56.33
                }, {
                name: 'Chrome',
                        y: 24.03,
                        sliced: true,
                        selected: true
                }, {
                name: 'Firefox',
                        y: 10.38
                }, {
                name: 'Safari',
                        y: 4.77
                }, {
                name: 'Opera',
                        y: 0.91
                }, {
                name: 'Proprietary or Undetectable',
                        y: 0.2
                }]
        }]
        });
});
        </script>
    </head>

    <body style="background-color: #dddbdb">
        {{include ('Menu.html')}}
        <div class="container" style="margin-top: 5%">
            <div class="row">
                <h1 style="text-align:center; margin-bottom: 2%">Gráfico Pizza A</h1>
                {% if graficos != null%}
                <div class="col-md-4" style="margin-top:10%">
                    <table id="tblGraficoPizza" class="table table-bordered" >
                        <thead style="background-color: #1E90FF;color: #FFF">
                            <tr>
                                <th><center>Nome</center></th>
                        <th><center>Quantidade</center></th>
                        </tr>
                        </thead>
                        <tbody>
                            {% for grafico in graficos %}
                            <tr class="active">       
                                <td>{{grafico.nome}}</td>
                                <td><center>{{grafico.quantidade}}</center></td>
                        </tr>
                        {% endfor %}
                        </tbody>
                    </table>
                </div>
                {% endif %}    
                <div class="col-md-8">
                    <div id="graficoPizza" style="min-width: 310px; min-height: 400px; max-height: 100%; max-width: 100%; margin: 0 auto"></div>
                </div>
            </div>
        </div>
    </body>
</html>
