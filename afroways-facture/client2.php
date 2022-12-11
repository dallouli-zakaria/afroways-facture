<?php
session_start();
include('config.php');
if(isset($_POST['submit'])){

  $_SESSION['ice']=$_POST['ice'];

  header("Location:facture.php");
}

$nomclient=$_SESSION['nomclient'];



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootsrap.min.js"></script>
    <title>test</title>
</head>
<body>
<form action="" method="POST">
  <section class="body-section ">
    <div class="container">
      <h4>Client</h4>
      <div class="row my-row1 p-4">
     <?php $sql = "SELECT codeclient,nomclient,adresseclient,villeclient,ice from client where nomclient=:nomclient";
$query = $dbh->prepare($sql);
$query->bindParam(':nomclient',$nomclient,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
        <div class="col-sm-12 col-md-3 "><b>code client</b><br><input type="text" placeholder="code client" class="p-2" name="codec" value="<?php echo htmlentities($result->codeclient)?>" readonly></div>
        <div class="col-sm-12 col-md-3"><b>nom client</b><br><input type="text" placeholder="nom client" class="p-2" name="nomc" value="<?php echo htmlentities($result->nomclient)?>" readonly></div>
        <div class="col-sm-12 col-md-3"><b>adresse client</b><br><textarea type="text" placeholder="adresse client"class="p-2" name="adressc" value="<?php echo htmlentities($result->adresseclient)?>" readonly><?php echo htmlentities($result->adresseclient)?></textarea></div>
        <div class="col-sm-12 col-md-3"><b>ville client</b><br><input type="text" placeholder="ville client"class="p-2" name="villec" value="<?php echo htmlentities($result->villeclient)?>" readonly></div>

      </div>
    </div>
    <div class="container  ">
      <h4>ICE</h4>
      <div class="row my-row1  p-4 ">
          <div class="col-md-2"><input type="text" class=" p-2" placeholder="ICE" name="ice" value="<?php echo htmlentities($result->ice)?>" readonly></div>
          <?php $ice1=$result->ice; $_SESSION['ice1']=$ice1; }}?>
          <input type="submit" class="mt-5 btn btn-primary" value="suivant" name="submit">
      </div>
  </form>
 


  


    
    



    <script src="main.js"></script>
    </body>
</html>