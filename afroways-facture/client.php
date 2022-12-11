<?php
session_start();
include('config.php');
if(isset($_POST['submit'])){



  $_SESSION['ice']=$_POST['ice'];

  $codec=$_POST['codec'];
  $nomc=$_POST['nomc'];
  $adressc=$_POST['adressc'];
  $villec=$_POST['villec'];
  $ice=$_POST['ice'];


  $sql="INSERT INTO  client(codeclient,nomclient,adresseclient,villeclient,ice) VALUES(:codec,:nomc,:adressc,:villec,:ice)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':codec',$codec,PDO::PARAM_STR);
  $query->bindParam(':nomc',$nomc,PDO::PARAM_STR);
  $query->bindParam(':adressc',$adressc,PDO::PARAM_STR);
  $query->bindParam(':villec',$villec,PDO::PARAM_STR);
  $query->bindParam(':ice',$ice,PDO::PARAM_STR);
  $query->execute();

  


header("Location:facture.php");


}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootsrap.min.js"></script>

    <title>test</title>
</head>
<body>
<form action="" method="POST" autocomplete="off">
  <section class="body-section ">
    <div class="container">
      <h4>Client</h4>
      
      <div class="row my-row1 p-4">
      <?php $error=""; if($error){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>admin cree avec succes! </strong><?php }?>
        <div class="col-sm-12 col-md-3 "><b>code client</b><br><input type="number" placeholder="code client" class="p-2" name="codec" required></div>
        <div class="col-sm-12 col-md-3"><b>nom client</b><br><input type="text" placeholder="nom client" class="p-2" name="nomc" required></div>
        <div class="col-sm-12 col-md-3"><b>adresse client</b><br><textarea type="text" placeholder="adresse client"class="p-2" name="adressc" ></textarea></div>
        <div class="col-sm-12 col-md-3"><b>ville client</b><br><input type="text" placeholder="ville client"class="p-2" name="villec" ></div>
      </div>
    </div>
    <div class="container  ">
      <h4>ICE</h4>
      <div class="row my-row1  p-4 ">
          <div class="col-md-2"><input type="number" class=" p-2" placeholder="ICE" name="ice" required></div>
          <input type="submit" class="mt-5 btn btn-primary" value="suivant" name="submit">
      </div>
  </form>
 


  


    
    



    <script src="main.js"></script>
   </body>
</html>