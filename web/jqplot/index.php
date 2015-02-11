<html>
<head>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.jqplot.min.js"></script>
<script type="text/javascript" src="plugins/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="plugins/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript" src="plugins/jqplot.pointLabels.min.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.jqplot.min.css" />
<script>
$(document).ready(function(){
        var s1 = [2, 6, 7, 10];
        var s2 = [7, 5, 3, 2];
        var s3 = [14, 9, 3, 8];
        plot3 = $.jqplot('bar-chart', [s1, s2, s3], {
            stackSeries: true,
            captureRightClick: true,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                rendererOptions: {
                    highlightMouseDown: true   
                },
                pointLabels: {show: true}
            },
            legend: {
                show: true,
                location: 'e',
                placement: 'outside'
            }     
        });
     
        $('#bar-chart').bind('jqplotDataRightClick',
            function (ev, seriesIndex, pointIndex, data) {
                $('#info3').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });
</script>
</head>
<body>
<div id="bar-chart" style="margin-top:20px; margin-left:20px; width:300px; height:300px;">1</div>
</body>
</html>