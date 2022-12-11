<?php

session_start();
include('config.php');

if(isset($_POST['submit'])){

    $_SESSION['nomclient']=$_POST['nomclient'];
    $cl=$_POST['nomclient'];

    $sql = "SELECT * from client where nomclient='$cl' ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0)
    {
        header("Location:client2.php");
    }else{
    $error="Client Introuvable, veulliez ressayer!";
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
            <img src="client.png" alt="">
        </div><br>
        <div class="text-center mt-4 name">
            Client Existant
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
            <input class="btn mt-3" type="submit" name="submit" value="suivant" id="sbm">

        </form>

        <br>
        <div class="text-center mt-4 name">
            Nouveau Client
        </div>
        <form class="p-3 mt-3" action="client.php">
            <button class="btn mt-3">inserer nouveau client</button>
        </form>
    </div>
    
</body>
</html>
