<?php
require 'function.php';

$rightjoin = "SELECT student.id, student.NIS, student.nama, student.email, student.domisili, nilai.matkul1 
              FROM student 
              RIGHT JOIN nilai ON student.id = nilai.id_student 
              ORDER BY nilai.matkul1 ASC";
$data = mysqli_query($conn, $rightjoin);

$datapoint = [];
foreach ($data as $dt){
	$datapoint[]=["label"=>$dt['nama'],"y"=>(int)$dt['matkul1']];}
$jsondata = json_encode($datapoint);


$rightjoin2 = "SELECT student.id, student.NIS, student.nama, student.email, student.domisili, nilai.matkul2 
              FROM student 
              RIGHT JOIN nilai ON student.id = nilai.id_student 
              ORDER BY nilai.matkul2 ASC";
$data2 = mysqli_query($conn, $rightjoin2);

$datapoint2 = [];
foreach ($data2 as $dt2){
    $datapoint2[]=["label"=>$dt2['nama'],"y"=>(int)$dt2['matkul2']];
};
$jsondata2 = json_encode($datapoint2);
?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
			.back{
    margin-top: 2rem;
    font-weight: 500;
    width: 100%;
}
	.back{
		color: white;
		font-weight: 700;
		background-color: #2c3e50 ;
		border-radius: 6px;
		width: 100%;
		height: 2rem;
	}
	.back:hover{
		background-color: black;
		transition: 0.2s ease-in-out;
	}
	.back a:hover{
		color: rgb(127, 229, 233);
	}


		</style>
		<title>Statistic</title>
	</head>
	<body>
		<div class="chartContainer">
			<div id="chartContainer" style="height: 300px; width: 100%;"></div>
		</div>
		<div class="chartContainer2">
			<div id="chartContainer2" style="height: 300px; width: 100%;"></div>
		</div>
		<button class="back" onclick="window.location.href='index.php'">🔙 Kembali</button>
	<script>
		function chart1() {
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			exportEnabled: true,
			theme: "light1", // "light1", "light2", "dark1", "dark2"
			title:{
				text: "Data Matkul Kecerdasan Koding"
			},
			axisY: {
			includeZero: true
			},
			data: [{
				type: "column", 
				indexLabelFontColor: "#5A5757",
				indexLabelFontSize: 16,
				indexLabelPlacement: "outside",
				dataPoints: <?php echo $jsondata ?>
			}]		
		})
		chart.render();}

		function chart2(){
			var chart2 = new CanvasJS.Chart("chartContainer2", {
				animationEnabled: true,
				theme: "light2", // "light1", "light2", "dark1", "dark2"
				title: {
					text: "Data Matkul Struktur Data"
				},
			axisY: {
				includeZero: true,
				maximum: 100, // Batas atas sumbu Y
				interval: 20  // Biar rapi, garis bantu tiap 20
			},
				data: [{
					type: "column",
					yValueFormatString: "#0",
					dataPoints: <?php echo $jsondata2 ?>
				}]
			});
			chart2.render();	
		}
		function test2(){
			chart1();
			chart2();
		}
		window.onload = test2;
	</script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>