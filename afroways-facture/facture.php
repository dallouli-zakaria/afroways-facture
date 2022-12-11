<?php

session_start();
include('config.php');
if(isset($_POST['submit2'])){


    $_SESSION['nomf']=$_POST['nomf'];
    $_SESSION['datef']=$_POST['datef'];
    $_SESSION['dossierf']=$_POST['dossierf'];
   

 $nomf=$_POST['nomf'];
 $datef=$_POST['datef'];
 $dossierf=$_POST['dossierf'];




$sql="INSERT INTO  facture(nomfacture,datef,dossier) VALUES(:nomf,:datef,:dossierf)";
$query = $dbh->prepare($sql);
$query->bindParam(':nomf',$nomf,PDO::PARAM_STR);
$query->bindParam(':datef',$datef,PDO::PARAM_STR);
$query->bindParam(':dossierf',$dossierf,PDO::PARAM_STR);
$query->execute();

header("Location:chargedech.php");



}

$ice=$_SESSION['ice'];


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootsrap.min.js"></script>
    <title>facture</title>
</head>
<body>
<form action="" method="POST" autocomplete="off">
<section class="body-section1">
    <div class="container  ">
      <h4>Facture</h4>
      <div class="row my-row1 p-4 ">
        <div class="col-sm-12 col-md-4"><b>Facture</b><br><input type="text" placeholder="Facture" class="p-2" name="nomf" required></div>
        <div class="col-sm-12 col-md-4"><b>Date</b><br><input type="date" placeholder="Date " class="p-2" name="datef"></div>
        <div class="col-sm-12 col-md-4" ><b>Dossier</b><br><input type="text" placeholder="Dossier"class="p-2" name="dossierf" required></div>
        <input type="submit" class="mt-5 btn btn-primary" value="suivant" name="submit2">
      </div>
    </div>
</form>

    <script src="main.js"></script>

</body>
</html>