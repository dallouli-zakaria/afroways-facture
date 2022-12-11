<?php 

session_start();
include('config.php');
include 'N2TEXT.php';


$nomf=$_SESSION['nomf'];
$ice=$_SESSION['ice'];





$totlntx=$_SESSION['ntx'];
$totaltaxable=$_SESSION['tx1'];
$taxettl3=$_SESSION['tx2'];
$taxettl=$_SESSION['tva1'];
$taxettl2=$_SESSION['tva2'];
$totlht=$_SESSION['totalhte'];
$totalttc=$_SESSION['totalttcs'];

/*$totalhte=$_SESSION['totalhte'];
$sommel=$_SESSION['sommel'];
$devise=$_SESSION['devise'];
$vierement=$_SESSION['vierement'];
$echeance=$_SESSION['echeance'];*/




if(isset($_GET['sub2'])){


    $ntx=$_GET['ntx'];
    $tx1=$_GET['tx1'];
    $tx2=$_GET['tx2'];
    $tva1=$_GET['tva1'];
    $tva2=$_GET['tva2'];
    $totalhte=$_GET['totalhte'];
    $sommel=$_GET['sommel'];
    $devise=$_GET['devise'];
    $vierement=$_GET['vierement'];
    $echeance=$_GET['echeance'];
    $totalttcs=$_GET['totalttcs'];




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

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<form action="" method="GET">
        <section class="body-section2 ">
            <div class="container">
            <h4>SOUS TOTAUX</h4>
            
            <div class="row my-row1 p-4">
                <div class="col-sm-12 col-md-3"><b>NON TAXABLE</b><br><input type="text"  class="p-2" readonly id="nontaxable" name="ntx" value="<?php echo sprintf('%.2f',$totlntx)?>"></div>
                <div class="col-sm-12 col-md-3"><b>TAXABLE</b><br><input type="text" class="p-2"readonly id="taxable" name="tx1"  value="<?php echo sprintf('%.2f',$totaltaxable)?>"></div>
                <div class="col-sm-12 col-md-3"><b>TAXE</b><br><input type="text" class="p-2" readonly id="stax" name="tx2" value="<?php echo sprintf('%.2f',$taxettl3)?>"></div>
            </div>
            <div class="row my-row1 p-4">
                <div class="col-sm-12 col-md-3"><b>T.V.A 14%</b><br><input type="text"  class="p-2" readonly id="tv14" name="tva1"  value="<?php echo sprintf('%.2f',$taxettl)?>"></div>
                <div class="col-sm-12 col-md-3"><b>T.V.A 20%</b><br><input type="text" class="p-2"readonly id="tv20" name="tva2"  value="<?php echo sprintf('%.2f',$taxettl2)?>"></div>
                <div class="col-sm-12 col-md-3" ><b>TOTAL H.T</b><br><input type="text" class="p-2"readonly id="totalht" name="totalhte"  value="<?php echo sprintf('%.2f',$totlht)?>"></div>
            </div>
            </div>
        </section>

        <section class="body-section3">
            <div class="container">
            <h4>Détails du Paiment</h4>
            <div class="row my-row1 p-4">
                <div class="col-sm-12 col-md-6"><b>la somme en lettre</b><br><input type="text"  class="p-2 col-md-12" name="sommel" value="<?php 
        //($totalmarks=sprintf('%.2f',$result->marks));
        
        $num = $totalttc;
        $whole = (int) $num;  // 5
        $frac  = sprintf('%.2f',$num - $whole);  // .7
$number = $whole;
$number2 = $frac;
$t = new ConvertNumberToText();
$d=$t->Convert($number);
$m=$t->Convert($frac);
echo "$d DHS ET $m CTS";?>"></div>
                <div class="col-sm-4 col-md-2"><b>DEVISE</b><br>
                <select class="form-select p-2" aria-label="Default select example" name="devise" id="devise">
                <option value="mad" selected>MAD</option>
                <option value="eur">EUR</option>
                <option value="usd">USD</option>      
                </select>
            </div>
    
            <div class="container"></div>
                <div class="col-sm-12 col-md-6"><b>Mode de reglement</b><br>
                <select class="form-select p-2" aria-label="Default select example" name="vierement">
                <option value="vierment au 007 640 0005369000000416 47 " selected>Vierement au 007 640 0005369000000416 47</option>
                <option value="par cheque">par cheque</option>
                <option value="liquide">liquide</option>
                </select></div>
                <div class="col-sm-12 col-md-3"><b>Echeance*</b><br><input type="date" class="p-2" name="echeance"></div>
                <div class="col-sm-12 col-md-3"><b>TOTAL TTC</b><br><input type="text" class="p-2" name="totalttcs" value="<?php echo sprintf('%.2f',$totalttc)?>" readonly ></div>
              
            </div>
            </div>
        </section> 
 




<div class="row my-row1  justify-content-center gx-2 ">
<input type="submit" class="col-sm-4 col-md-6 m-2 btn btn-primary" value="terminer" name="sub2" >
          </div>
</form>
</body>
</html>