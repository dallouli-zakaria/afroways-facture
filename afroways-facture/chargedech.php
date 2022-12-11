<?php

session_start();
include('config.php');

$nomf=$_SESSION['nomf'];
$ice=$_SESSION['ice'];

if(isset($_POST['submit3'])){



    $_SESSION['datech']=$_POST['datech'];
    $_SESSION['lieuch']=$_POST['lieuch'];
    $_SESSION['lieudech']=$_POST['lieudech'];

   

 $datech=$_POST['datech'];
 $lieuch=$_POST['lieuch'];
 $lieudech=$_POST['lieudech'];





$sql="INSERT INTO  charged(datecharge,lieucharge,lieudecharge,ice,nomfacture) VALUES(:datech,:lieuch,:lieudech,:ice,:nomf)";
$query = $dbh->prepare($sql);
$query->bindParam(':datech',$datech,PDO::PARAM_STR);
$query->bindParam(':lieuch',$lieuch,PDO::PARAM_STR);
$query->bindParam(':lieudech',$lieudech,PDO::PARAM_STR);
$query->bindParam(':ice',$ice,PDO::PARAM_STR);
$query->bindParam(':nomf',$nomf,PDO::PARAM_STR);
$query->execute();



header("Location:remoque.php");

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
    <div class="container">
      <h4>Chargement / Dechargement</h4>
      <div class="row my-row1 p-4 ">
        <div class="col-sm-12 col-md-4"><b>Date de Chargement</b><br><input type="date" placeholder="Date de Chargement" class="p-2" name="datech" required></div>
        <div class="col-sm-12 col-md-4"><b>Lieu de Chargement</b><br><input type="text" placeholder="Lieu de Chargement " class="p-2" name="lieuch" required></div>
        <div class="col-sm-12 col-md-4 "><b>Lieu et Ville de Dechargement</b><br><input type="text" class="p-2" placeholder="Lieu - Ville" name="lieudech" required></div>
        <input type="submit" class="mt-5 btn btn-primary" value="suivant" name="submit3">
      </div>
    </div>
  </section>
</form>

<script src="main.js"></script>
</body>
</html>