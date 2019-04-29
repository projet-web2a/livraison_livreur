<?php 
 
require 'C:/xampp/htdocs/eyezone/entites/commande.php';
require 'C:/xampp/htdocs/eyezone/core/commandeC.php';


$cc=new commandeC();
$listeComande=$cc->afficherCommande();
$res=false;
$num=0;
$maction='afficher';
$par="";
$res1=false;
 if (isset($_GET['search']))
  {
    $idCommande=$_GET['search'];
    $listeProduit=$cc->afficher_ProduitsCommande($idCommande);
    $res=true;
   }

 
    if (isset($_POST['search']))
  {
    $idCommande=$_POST['search'];
    $listeProduit=$cc->afficher_ProduitsCommande($idCommande);
    $res=true;
   }
    if(isset($_GET['maction']))
            {$maction=$_GET['maction'];}
          if($maction=='trier')
            {
              $par=$_GET['par'];
              $listeComande=$cc->trier($par);
            }
          else if 
            ($maction=='stat')
            {
              $num=$_GET['num'];       
            }


?>
<!DOCTYPE html>
<html>
<head>
  <?php require 'head.php'; ?>

</head>
<body>
    <div class="page">
      <!-- Main Navbar-->
    <?php require'navbar.php'; ?>
      <div class="page-content d-flex align-items-stretch"> 

        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <?php require 'sidenavbar.php'; ?>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Commandes</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Commandes</li>
            </ul>
          </div>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">


                     <div  class="container-fluid"> 

                  <div class="card text-center ">
                    <div class="card-close">
                
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h1"> Statistique Commandes  </h3>
                    </div>
                    <div class="card-body">
                        <div class="dropdown">
                          
  <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
STAT  </a>

  <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item " href="statistiqueDesCommandes.php?maction=stat&num=1">nombre des Commande par année</a>
    <a class="dropdown-item " href="statistiqueDesCommandes.php?maction=stat&num=2">Revenu de l'année par mois </a>
    <a class="dropdown-item " href="statistiqueDesCommandes.php?maction=stat&num=3">Les produit les plus commandées</a>
  </div>
</div>
                      <div class="table-responsive">
                      <?php 
                      if ($num==1)
                          require_once'statistiqueCommandes.php';
                          else if ($num==2)
                        require_once'stat.php';
                      else
                        require_once'statistique.php';

                           ?>
                      </div>
                    </div>
                  </div>
                </div>
               

              </div>
            </div>
          </section>

          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>EyeZone</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>&nbsp;</p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>