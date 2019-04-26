<?php
require_once  '../../config.php';
$db=config::getConnexion();
  
   $req1= $db->query("SELECT  month_name, COALESCE(sum(prixtotal),0) as total FROM months  left OUTER join commande  on month(datecommande) =months.month_num AND YEAR(dateCommande)=2019 GROUP by months.month_num  order by months.month_num   ");
   $req1->execute();
 	 			$liste= $req1->fetchALL(PDO::FETCH_OBJ);


/*$dataPoints = array( 
	array("y" => 7,"label" => $nom),
	array("y" => 12,"label" => "April" ),
	array("y" => 28,"label" => "May" ),
	array("y" => 18,"label" => "June" ),
	array("y" => 41,"label" => "July" )
);*/
$dataPoints = array();
foreach ($liste as $tache) {
    $dataPoints[] = array('y' => $tache->total, 'label' => $tache->month_name);
}
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart= new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	 theme: "light2",
	title:{
		text: "Revenue de l'annee"
	},
	axisY: {
		title: "Revenu (en dinar)",
		suffix:  "DT"
	},
	data: [{
		type: "bar",
		yValueFormatString: "#,##0DT",


		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%; margin-left: 20px" align="lefet"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>       
