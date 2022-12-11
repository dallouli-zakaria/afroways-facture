<?php 
session_start();
include('config.php');



if(isset($_POST['submit'])){
  $nomcl=$_POST['nomcl'];
  
  $sql = "SELECT codeclient, nomclient, adresseclient, villeclient, ice FROM client WHERE nomclient='$nomcl'";
  $query = $dbh->prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);


  
}







?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/cherchef.css">
  <title>AFROWAYS</title>
</head>
<body>
<div class="center">
  <h1>Chercher Facture</h1>
  <form method="POST">
    <div class="inputbox">
      <input type="text" required="required" name="nomcl">
      <span>nom client</span>
    </div>
    <div class="inputbox">
      <input type="text" required="required" name="nomf">
      <span>nom facture</span>
    </div>
    
    <div class="inputbox">
      <input type="submit" value="chercher" name="submit" ></input>
    </div>
  </form>
</div>
</body>


</html>