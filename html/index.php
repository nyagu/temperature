<?php
	$date = date('Ymd');
	$file = file_get_contents('../file/temp/' . $date);
	$temp = explode("\n", $file);

	

?>
<html>
  <head>
    <script type="text/javascript"
          src="https://www.google.com/jsapi?autoload={
            'modules':[{
              'name':'visualization',
              'version':'1',
              'packages':['corechart']
            }]
          }"></script>

    <script type="text/javascript">
      google.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'temputure'],
<?php
	foreach ($temp as $t) {
		if ($t == '') continue;
		$d = substr($t, 0,16); 
		$t = substr($t, -5);
		$t = intval($t) / 1000;
			

		echo "['$d', $t],";
	}
?>
        ]);

        var options = {
          title: 'Living Room',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>
