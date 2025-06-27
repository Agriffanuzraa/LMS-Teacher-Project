<?php
require 'function.php';

$rightjoin = "SELECT student.id, student.NIS, student.nama, student.email, student.domisili, nilai.matkul1 
              FROM student 
              RIGHT JOIN nilai ON student.id = nilai.id_student 
              ORDER BY nilai.matkul1 ASC";
$data = mysqli_query($conn, $rightjoin);

$datapoint = [];
foreach ($data as $dt){
    $datapoint[]=["x"=>$dt['nama'],"y"=>(int)$dt['matkul1']];

};
$jsondata = json_encode($datapoint);

?>

<!DOCTYPE HTML>
<html>
<head>
<script>

window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Simple Column Chart with Index Labels"
	},
  	axisY: {
          includeZero: true
        },
        
	data: [{
		type: "column", 
		indexLabelFontColor: "#5A5757",
        indexLabelFontSize: 16,
		indexLabelPlacement: "outside",
		dataPoints: $jsondata
    }]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>