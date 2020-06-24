<script>
/*--------------  overview-chart start ------------*/
 if ($('#visitors_web').length) {

    Highcharts.chart('visitors_web', {
        chart: {
            type: 'areaspline'
        },
        title: true,
        yAxis: {
            title: {
                    text: 'visitor'
                },
            gridLineColor: '#fbf7f7',
            gridLineWidth: 1
        },
        xAxis: {
            gridLineColor: '#fbf7f7',
            gridLineWidth: 1
        },
        series: [{
                name:'Visitors per day',
                data: <?php echo $value;?>,
                fillColor: 'rgba(76, 57, 249, 0.5)',
                lineColor: 'transparent'
            }
        ]
    });
} 

/*--------------  overview-chart END ------------*/

/*--------------  coin distrubution chart END ------------*/
if ($('#visitors_browser').length) {

    zingchart.THEME = "classic";

    var myConfig = {
        "globals": {
            "font-family": "Roboto"
        },
        "graphset": [{
                "type": "pie",
                "background-color": "#fff",
                "legend": {
                    "background-color": "none",
                    "border-width": 0,
                    "shadow": false,
                    "layout": "float",
                    "margin": "auto auto 16% auto",
                    "marker": {
                        "border-radius": 3,
                        "border-width": 0
                    },
                    "item": {
                        "color": "%backgroundcolor"
                    }
                },
                "plotarea": {
                    "background-color": "#FFFFFF",
                    "border-color": "#DFE1E3",
                    "margin": "25% 8%"
                },
                "labels": [{
                    "x": "45%",
                    "y": "47%",
                    "width": "10%",
                    "text": "<?php echo $all_visitors;?> Visitor",
                    "font-size": 20,
                    "font-weight": 700
                }],
                "plot": {
                    "size": 70,
                    "slice": 90,
                    "margin-right": 0,
                    "border-width": 0,
                    "shadow": 0,
                    "value-box": {
                        "visible": true
                    },
                    "tooltip": {
                        "text": "%v %",
                        "shadow": false,
                        "border-radius": 2
                    }
                },
                "series": [{
                        "values": [<?php echo number_format($chrome_visitor);?>],
                        "text": "Google Chrome",
                        "background-color": "#4cff63"
                    },
                    {
                        "values": [<?php echo number_format($firefox_visitor);?>],
                        "text": "Firefox",
                        "background-color": "#fd9c21"
                    },
                    {
                        "values": [<?php echo number_format($explorer_visitor);?>],
                        "text": "Internet Explorer",
                        "background-color": "#2c13f8"
                    },
                    {
                        "values": [<?php echo number_format($safari_visitor);?>],
                        "text": "Safari",
                        "background-color": "#596275"
                    },
                    {
                        "values": [<?php echo number_format($opera_visitor);?>],
                        "text": "Opera",
                        "background-color": "#706fd3"
                    }
                ]
            }

        ]
    };

    zingchart.render({
        id: 'visitors_browser',
        data: myConfig,
    });
}
/*--------------  coin distrubution chart END ------------*/
</script>