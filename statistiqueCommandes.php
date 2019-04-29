<?php
require_once  '../../config.php';
$db=config::getConnexion();
  
    $req1= $db->query("SELECT COUNT(*) as nb1 FROM commande WHERE YEAR(dateCommande)=YEAR(sysdate())-3  " );
    $nb1 = $req1->fetch();

    $req2= $db->query("SELECT COUNT(*) as nb2 FROM commande WHERE YEAR(dateCommande)=YEAR(sysdate())-2 " );
    $nb2 = $req2->fetch();

    $req3= $db->query("SELECT COUNT(*) as nb3 FROM commande WHERE YEAR(dateCommande)=YEAR(sysdate())-1  " );
    $nb3 = $req3->fetch();
       
    $req4= $db->query("SELECT COUNT(*) as nb4 FROM commande WHERE  YEAR(dateCommande)=YEAR(sysdate()) ");
    $nb4 = $req4->fetch();



$dataPoints = array(
  array("label"=> date("Y")-3, "y"=> intval($nb1['nb1'])),
  array("label"=> date("Y")-2, "y"=> intval($nb2['nb2'])),
  array("label"=> date("Y")-1, "y"=> intval($nb3['nb3'])),
  array("label"=> date("Y"), "y"=> intval($nb4['nb4'])),
);
  
?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  exportEnabled: true,
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Statistique des Commandes "
  },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    indexLabelFontColor: "#5A5757",
    indexLabelPlacement: "outside",   
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>

<div class="agile-grids"> 
<div id="chartContainer" style="height: 370px; width: 83%; margin-left: 20px" align="center"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
<script>
    $(document).ready(function() {
       var navoffeset=$(".header-main").offset().top;
       $(window).scroll(function(){
        var scrollpos=$(window).scrollTop(); 
        if(scrollpos >=navoffeset){
          $(".header-main").addClass("fixed");
        }else{
          $(".header-main").removeClass("fixed");
        }
       });
       
    });
</script>
