<?php

session_start();
include('config.php');

$nomf=$_SESSION['nomf'];
$ice=$_SESSION['ice'];

if(isset($_POST['submit4'])){


  $_SESSION['numrm']=$_POST['numrm'];
  $_SESSION['naturem']=$_POST['naturem'];
  $_SESSION['nbcolis']=$_POST['nbcolis'];
  $_SESSION['poids']=$_POST['poids'];
  $_SESSION['volume']=$_POST['volume'];



    $numrm=$_POST['numrm'];
    $naturem=$_POST['naturem'];
    $nbcolis=$_POST['nbcolis'];
    $poids=$_POST['poids'];
    $volume=$_POST['volume'];


$sql="INSERT INTO  marchandise(nremoque,naturem,nbrcolis,poids,volume,ice,nomfacture) VALUES(:numrm,:naturem,:nbcolis,:poids,:volume,:ice,:nomf)";
$query = $dbh->prepare($sql);
$query->bindParam(':numrm',$numrm,PDO::PARAM_STR);
$query->bindParam(':naturem',$naturem,PDO::PARAM_STR);
$query->bindParam(':nbcolis',$nbcolis,PDO::PARAM_STR);
$query->bindParam(':poids',$poids,PDO::PARAM_STR);
$query->bindParam(':volume',$volume,PDO::PARAM_STR);
$query->bindParam(':ice',$ice,PDO::PARAM_STR);
$query->bindParam(':nomf',$nomf,PDO::PARAM_STR);
$query->execute();

header("Location:facturationm.php");

}











?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootsrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<form action="" method="POST" autocomplete="off">
<section class="body-section1">
    <div class="container  ">
      <h4>Détails Marchandise</h4>
      <div class="row my-row1 p-4 ">
        <div class=" col-lg-2"><b>Nº Remoque</b><br><input type="text" placeholder="Nº Remoque" class="p-2 col-lg-10" name="numrm"></div>
        <div class=" col-lg-3"><b>Nature de Marchandise</b><br><input type="text" placeholder="Nature de Marchandise " class="p-2 col-lg-10" name="naturem" required></div>
        <div class=" col-lg-2" ><b>Nombre de Colis</b><br><input type="number" step="any" placeholder="Nombre de Colis"class="p-2 col-lg-10" name="nbcolis" ></div>
        <div class=" col-lg-2" ><b>Poids (kg)</b><br><input type="number" step="any" placeholder="Poids(kg)"class="p-2 col-lg-10" name="poids" ></div>
        <div class=" col-lg-2" ><b>Volume</b><br><input type="numer"  step="any" placeholder="Volume"class="p-2 col-lg-10" name="volume"></div>
        <input type="submit" class="mt-5 btn btn-primary" value="suivant" name="submit4">
      </div>
    </div>
  </section>
</form>

<script src="main.js"></script>
</body>
</html>