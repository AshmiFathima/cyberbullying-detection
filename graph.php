<?php
error_reporting(0);
$con=mysqli_connect("localhost","root","","socialnetwork");
//$result = mysqli_query($con,"SELECT count(*) as cc,status,MONTHNAME(date) as mm FROM activity  group by  status,YEAR(date),MONTH(date)");
$result = mysqli_query($con,"SELECT count(*) as cc,status FROM activity  group by  status,YEAR(date)");
		while($row=mysqli_fetch_array($result))
		{
			
					
			$graphdata=$graphdata."{
        'country': '$row[status]',
        'year2004': $row[cc],
		'color':'#000'
    },";
	
	
	$graphdata2=$graphdata2."{
    'country': '$row[status]',
    'litres': $row[cc]
  },";
			
		}


?>













<!-- Styles -->
<style>
#chartdiv {
	margin:auto;
	width		: 50%;
	height		: 500px;
	font-size	: 11px;
}					
</style>

<!-- Resources -->
<script src="amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv", {
    "theme": "light",
    "type": "serial",
    "dataProvider": [<?php
	echo $graphdata;
	
	?>],
    "valueAxes": [{
        "unit": "",
        "position": "left",
        "title": " Summary",
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": " [[category]] : <b>[[value]] Category</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2004",
        "type": "column",
        "valueField": "year2004"
    }, {
        "balloonText": "[[category]] : <b>[[value]] Vacancy</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2005",
        "type": "column",
        "clustered":false,
        "columnWidth":0.5,
        "valueField": "year2005"
    }],
    "plotAreaFillAlphas": 0.1,
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start"
    },
    "export": {
    	"enabled": false
     }

});
</script>

	













<!-- Styles -->
<style>
#chartdiv2 {
  width: 90%;
  height: 900px;
}
</style>
<?php

//echo $graphdata2
?>
<!-- Resources -->

<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<!-- Chart code -->
<script>
var chart = AmCharts.makeChart( "chartdiv2", {
  "type": "pie",
 
  
  "dataProvider": [ <?php
	echo $graphdata2;
	?> ],
  "valueField": "litres",
  "titleField": "country",
   "balloon":{
   "fixedPosition":true
  },
  "export": {
    "enabled": false
  }
} );
</script>


<!-- HTML

<div id="chartdiv"></div>
<div id="chartdiv2" style="margin-top:-30px;"></div>
</div> -->
<style>

.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  padding-top: 20px;
}


.left {
  left: 0;
  background-color: #FFF;
}


.right {
  right: 0;
  background-color: #FFF;
}


.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
.centered {
  margin: auto;
  width: 100%;
  height: 100%
  border-radius: 100%;
}


</style>

<div class="split left">
  <div class="centered">
    <div id="chartdiv"></div>
  </div>
</div>

<div class="split right">
  <div class="centered">
   <div id="chartdiv2" style="margin-top:-20px;"></div> 
  </div>
</div>