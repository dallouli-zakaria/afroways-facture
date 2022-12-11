<?php

session_start();
include('config.php');
$error=0;
if(isset($_POST['submit'])){

    $_SESSION['nomclient']=$_POST['nomclient'];
    $_SESSION['nomfacture']=$_POST['nomfacture'];
    $fct=$_SESSION['nomfacture'];
    $sql = "SELECT * from facture where nomfacture='$fct' ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0)
    {
        header("Location:testfinal2.php");
    }else{
    $error="Facture Introuvable, Veuillez ressayer!";
    }

}




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
        <div class="logo">
            <img src="images/file.png" alt="">
        </div><br>
        <div class="text-center mt-4 name">
            Nom client
        </div>
        <?php if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Erreur! </strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
        <form action="" method="POST">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="nomclient" id="nomclient" placeholder="nom client"  autocomplete="off" required>
            </div>
            <div class="text-center mt-4 name">
            Nom facture
        </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="nomfacture" id="nomfacture" placeholder="nom facture"  autocomplete="off" required>
            </div>
            <input class="btn mt-3" type="submit" name="submit" value="suivant" id="sbm">


        </form>

        
    </div>
    
</body>
</html>
