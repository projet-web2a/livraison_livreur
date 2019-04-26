<?php
 require_once  '../../config.php';
$db=config::getConnexion();
  
   $req1= $db->query("SELECT distinct sum(quantiteCommandee) as total ,mar FROM lignecommande l join produit p on l.refe=p.refe group by mar"
  );
   $req1->execute();
 		$liste= $req1->fetchALL(PDO::FETCH_OBJ);
		 	$req2= $db->query("SELECT sum(quantiteCommandee) as nb FROM lignecommande   " );
    $nb = $req2->fetch();

 $dataPoints = array();
foreach ($liste as $row) {
    $dataPoints[] = array('label' => $row->mar, 'y' => $row->total/intval($nb['nb'])*100);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,

	 theme: "light1",
	title: {
		text: "les produit les plus commandées"
	},
	
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",

		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>   
