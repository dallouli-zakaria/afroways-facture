<?php
session_start();
include('config.php');

$codec=$_SESSION['codec'];

$sql = "select * from client where codeclient=$codec";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

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
    







<script src="main.js"></script>
</body>
</html>