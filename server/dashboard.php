  <html>
  <head>
<?php
include('db.php');
$time = time() - 60000000000;
$graph_data = "['Time', 'Value'],";
$query = 'select timestamp, value from readings where timestamp > ' . $time;

$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
while($row = mysqli_fetch_assoc($result)) {
	$graph_data .= '[' . $row['timestamp'] . ', ' . $row['value'] . ']' . ',' ;
}
//echo substr($graph_data, 0, -1);
?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          <?php echo substr($graph_data, 0, -1); ?>
        ]);

        var options = {
          title: 'Water level',
          curveType: 'function',
          legend: { position: 'bottom' },
          hAxis:{
             baselineColor: '#fff',
             gridlineColor: '#fff',
             textPosition: 'none'
       }
	  
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

