
function matkul1(){
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
		});
}