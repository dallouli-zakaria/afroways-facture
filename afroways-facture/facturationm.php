<?php


session_start();
include('config.php');
include 'N2TEXT.php';

$nomf=$_SESSION['nomf'];
$ice=$_SESSION['ice'];

if(isset($_POST['submit2'])){

  
  $ntx=$_POST['ntx'];
  $tx1=$_POST['tx1'];
  $tx2=$_POST['tx2'];
  $tva1=$_POST['tva1'];
  $tva2=$_POST['tva2'];
  $totalhte=$_POST['totalhte'];
  $sommel=$_POST['sommel'];
  $devise=$_POST['devise'];
  $vierement=$_POST['vierement'];
  $echeance=$_POST['echeance'];
  $totalttcs=$_POST['totalttcs'];


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
if (isset($_GET['submit'])){


  
  $libelle=$_GET['libelle'];
  $tarif=$_GET['tarif'];
  $quantite=$_GET['quantite'];
  $taxe=$_GET['taxe'];

  $sql="INSERT INTO  facturationtest(libelle,tarif,quantite,taxe,ice,nomfacture) VALUES(:libelle,:tarif,:quantite,:taxe,:ice,:nomf)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':libelle',$libelle,PDO::PARAM_STR);
  $query->bindParam(':tarif',$tarif,PDO::PARAM_STR);
  $query->bindParam(':quantite',$quantite,PDO::PARAM_STR);
  $query->bindParam(':taxe',$taxe,PDO::PARAM_STR);
  $query->bindParam(':ice',$ice,PDO::PARAM_STR);
  $query->bindParam(':nomf',$nomf,PDO::PARAM_STR);
  $query->execute();








  
}

$totaltaxable=0;$totlntx=0;$totalht=0;$taxettl=0;$taxettl2=0;$taxettl3=0;$rsx=0;$smito1=0;$smito2=0;$smito3=0;;$totltx2=0;$cnt=0;$totaltx1=0;$totltx1=0;$cnt;$totaltx2=0;$trf=0;$trfcmt=0;$trf=0;$qtt=0;$qttcmt=0;$qtt=0;$taxe=0;$total=0;$trf=0;$qtt=0;$totlht=0;$total=0;


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
  








<form action="" method="GET" autocomplete="off">
<section class="body-section1">
    <div class="container ">
      <h4>Facturation Marchandise</h4>
      
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Libelle</th>
      <th scope="col">Tarif</th>
      <th scope="col">Quantité</th>
      <th scope="col">Taxe</th>
    </tr>
  </thead>
  <tbody>
  <?php

$sql = "SELECT libelle,tarif,quantite,taxe from facturationtest where ice='$ice' and nomfacture='$nomf'";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {   ?>
    <tr>
      <td><?php echo htmlentities($rsx=$result->libelle);?></td>
      <td><?php echo htmlentities($trf=sprintf('%.2f',$result->tarif)); $trfcmt+=$trf; ?></td>
      <td><?php echo htmlentities($qtt=$result->quantite); $qttcmt+=$qtt; ?></td>
      <td><?php echo htmlentities($taxe=$result->taxe); if($taxe=="non taxable"){

        $smito2=0;
        $smito3=0;
        $smito1=$trf*$qtt;
         $total=$trf*$qtt;
         $totlntx+=$total;


      }else if($taxe=="taxable 14%"){
        
        $smito1=0;
      $totaltx1=$trf*$qtt+($trf*$qtt*0.14);
      $smito3=$trf*$qtt*0.14;
      $taxettl+=$trf*$qtt*0.14;
      $smito2=$trf*$qtt;
      $totltx1+=$totaltx1;}
      else if($taxe=="taxable 20%"){
        $smito1=0;
        $totaltx2=$trf*$qtt+($trf*$qtt*0.2);
        $smito3=$trf*$qtt*0.2;
        $smito2=$trf*$qtt;
        $totltx2+=$totaltx2;
        $taxettl2+=$trf*$qtt*0.2;
      }
      $totlht+=$trf*$qtt;
      $taxettl3=$taxettl2+$taxettl;
      $totaltaxable+=$smito2;
      ?></td>
    </tr>

    <?php
    

    $_SESSION['rsx']=$rsx;
    $_SESSION['smito1']=$smito1;
    $_SESSION['smito2']=$smito2;
    $_SESSION['smito3']=$smito3;




    
?>
    <?php }  
        $lbl2=$rsx;
        $nontxbl=$smito1;
        $txblr=$smito2;
        $taxex=$smito3;
      
        $sql="INSERT INTO  tblfacturation(libelle,nontxbl,txbl,taxe,ice,nomfacture) VALUES(:lbl2,:nontxbl,:txblr,:taxex,:ice,:nomf)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':lbl2',$lbl2,PDO::PARAM_STR);
        $query->bindParam(':nontxbl',$nontxbl,PDO::PARAM_STR);
        $query->bindParam(':txblr',$txblr,PDO::PARAM_STR);
        $query->bindParam(':taxex',$taxex,PDO::PARAM_STR);
        $query->bindParam(':ice',$ice,PDO::PARAM_STR);
        $query->bindParam(':nomf',$nomf,PDO::PARAM_STR);
        $query->execute();

  }
    
    
    $cnt++;
 $totalttc=$totlht+$taxettl3;
  ?>

  </tbody>
</table>

      <div class="row my-row1 p-4">
        <div class="col-sm-12 col-md-3"><b>Libelle</b><br><input type="text" placeholder="Libelle" class="p-2" id="lbl" name="libelle" required></div>
        <div class="col-sm-12 col-md-3"><b>Tarif</b><br><input type="number" step="any" placeholder="Tarif"class="p-2" id="tarif" name="tarif"></div>
        <div class="col-sm-12 col-md-3"><b>Quantité</b><br><input type="number" placeholder="Quantité" class="p-2" id="qti" name="quantite"></div>
        <div class="col-sm-12 col-md-3"><b>TAXE</b><br>
          <select class="form-select p-2 " aria-label="Default select example" id="tx" name="taxe" >
          <option value="non taxable" selected>Non Taxable</option>
          <option value="taxable 14%">Taxable 14%</option>
          <option value="taxable 20%">Taxable 20%</option>
        </select>
        </div>
        </div>

  </section>
<?php

 $_SESSION['ntx']=$totlntx;
 $_SESSION['tx1']=$totaltaxable;
 $_SESSION['tx2']=$taxettl3;
 $_SESSION['tva1']=$taxettl;
 $_SESSION['tva2']=$taxettl2;
 $_SESSION['totalhte']=$totlht;
 $_SESSION['totalttcs']=$totalttc;





?>
  <div class="row my-row1  justify-content-center gx-2 ">
          <input type="submit" class="col-sm-4 col-md-2 m-2 btn btn-success" value="ajouter" name="submit" >
        
          </div>
 </form>
 <div class="row my-row1  p-4 justify-content-center">
 <a href="totalttc.php" class="col-sm-6 col-md-4 m-4 mt-4" ><input type="button" class="col-12 btn btn-primary" value="suivant" ></a>
      </div>










  <script src="main.js"></script>
</body>
</html>