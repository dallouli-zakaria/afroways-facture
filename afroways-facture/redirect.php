<?php
session_start();
include('config.php');





$nomf=$_SESSION['nomf'];
$ice=$_SESSION['ice'];


$ntx=$_SESSION['ntx'];
$tx1=$_SESSION['tx1'];
$tx2=$_SESSION['tx2'];
$tva1=$_SESSION['tva1'];
$tva2=$_SESSION['tva2'];
$totalhte=$_SESSION['totalhte'];
$sommel=$_SESSION['sommel'];
$devise=$_SESSION['devise'];
$vierement=$_SESSION['vierement'];
$echeance=$_SESSION['echeance'];
$totalttcs=$_SESSION['totalttcs'];




$sql="INSERT INTO total(nontaxable, taxable, taxe, tva14, tva20, totalht, sommel, devise, reglement, echeance, totalttc, ice, nomfacture) VALUES 
(:ntx,:tx1,:tx2,:tva1,:tva2,:totalhte,:sommel,:devise,:vierement,:echeance,:totalttcs,:ice,:nomf)";
$query = $dbh->prepare($sql);
$query->bindParam(':ntx',$ntx,PDO::PARAM_STR);
$query->bindParam(':tx1',$tx1,PDO::PARAM_STR);
$query->bindParam(':tx2',$tx2,PDO::PARAM_STR);
$query->bindParam(':tva1',$tva1,PDO::PARAM_STR);
$query->bindParam(':tva2',$tva2,PDO::PARAM_STR);
$query->bindParam(':totalhte',$totalhte,PDO::PARAM_STR);
$query->bindParam(':sommel',$sommel,PDO::PARAM_STR);
$query->bindParam(':devise',$devise,PDO::PARAM_STR);
$query->bindParam(':vierement',$vierement,PDO::PARAM_STR);
$query->bindParam(':echeance',$echeance,PDO::PARAM_STR);
$query->bindParam(':totalttcs',$totalttcs,PDO::PARAM_STR);
$query->bindParam(':ice',$ice,PDO::PARAM_STR);
$query->bindParam(':nomf',$nomf,PDO::PARAM_STR);
$query->execute();

header("Location:testfinal.php"); 

?>