<?php
session_start();
include('config.php');

$nomclient=$_SESSION['nomclient'];
$nomf=$_SESSION['nomfacture'];

if(isset($_POST['submit'])){

    session_destroy();
    header("Location:index.php");
}

$sql = "select ice from client where nomclient='$nomclient'";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result){
    $ice=$result->ice;
    }



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="testcss.css" media="screen">
<link rel="stylesheet" href="testcss2.css" media="print">
<link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootsrap.min.js"></script>
    <title>Document</title>

</head>
<body>
<section id="printi">


    <div class="headra">
        <img src="images/afroways-logo.PNG" alt="" srcset="" class="img1">
        <div class="tbl">
        <table class="client">
            <thead style="text-transform:uppercase; font-style: italic;font-size:15px">
                <b style="text-decoration: underline;">Client</b>
               <?php $sql = "SELECT codeclient, nomclient, adresseclient, villeclient, ice FROM client WHERE ice='$ice' ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

foreach($results as $result){
    $codeclient=$result->codeclient;

?>
                <tr>
                <th>
                <?php echo $result->nomclient;?>
                </th>
                </tr>
                <tr>
                <th><?php echo $result->adresseclient;?></th>
                </tr>
                <tr>
                <th><?php echo $result->villeclient;?></th>
                </tr>
                
            </thead>

        </table><br><br>
        <b class="ice">ICE:<?php echo $result->ice;}?></b>
        </div>

    </div>
    <div class="bodya">
        <table class="tbl2">
            <thead>
                <tr>
                    <th>facture</th>
                    <th>date</th>
                    <th>code client</th>
                    <th>Dossier</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php $sql = "SELECT  nomfacture,datef,dossier FROM facture WHERE nomfacture='$nomf' ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

foreach($results as $result){
    
?>
                    <td><?php echo $result->nomfacture;?></td>
                    <td><?php echo $result->datef;?></td>
                    <td><?php echo $codeclient;?></td>
                    <td><?php echo $result->dossier;}?></td>
                </tr>
            </tbody>
        </table>
        <table class="chrg">
            <tbody>
                <tr> <?php $sql = "SELECT  datecharge,lieucharge,lieudecharge FROM charged WHERE ice='$ice' and nomfacture='$nomf' ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

foreach($results as $result){
    
?>
                    <td>Date de chargement :</td>
                    <td></td>
                    <td><?php echo $result->datecharge;?></td>
                </tr>
                <tr>
                    <td>Lieu de chargement : </td>
                    <td></td>
                    <td><?php echo $result->lieucharge;?></td>
                </tr>
                <tr>
                    <td>Lieu de dechargement :</td>
                    <td></td>
                    <td><?php echo $result->lieudecharge;}?></td>
                </tr>

            </tbody>

        </table>
        <table class="tbl3">
            <thead>
                <tr>
                    <th>N Remoque</th>
                    <th>Nature de Marchandise</th>
                    <th>Nombr de Colis</th>
                    <th>Poids(kg)</th>
                    <th>Volume</th>
                </tr>
            </thead>
            <tbody>
                <tr><?php $sql = "SELECT  nremoque,naturem,nbrcolis,poids,volume FROM marchandise WHERE ice='$ice' and nomfacture='$nomf' ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

foreach($results as $result){
    
?>
                    <td><?php echo $result->nremoque;?></td>
                    <td><?php echo $result->naturem;?></td>
                    <td><?php echo $result->nbrcolis;?></td>
                    <td><?php echo $result->poids;?></td>
                    <td><?php echo $result->volume;}?></td>
                </tr>
            </tbody>
        </table>
        <table class="tbl4 ">
            <thead>
                <tr>
                    <th>LIBELLE</th>
                    <th>NON TAXABLE</th>
                    <th>TAXABLE</th>
                    <th>TAXE</th>

                </tr>
            </thead>
            <tbody><?php $sql = "SELECT  libelle,nontxbl,txbl,taxe FROM tblfacturation WHERE ice='$ice' and nomfacture='$nomf' ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);



?>
                <tr class="maintr">
                    <td><table class="table"><?php foreach($results as $result){ ?><tr class="border-0"><td class="border-0"><?php echo $result->libelle; ?></td></tr><?php }?></table></td>
                    
                    <td><table class="table"><?php foreach($results as $result){ $ma=$result->nontxbl?><tr class="border-0"><td class="border-0"><?php if($ma=="0"){?><span style="color:white; font-size:0px;"><?php echo $ma;?></span><?php }else{echo $ma;}  ?></td></tr><?php }?></table></td>
                    <td><table class="table"><?php foreach($results as $result){ $mb=$result->txbl?><tr class="border-0"><td class="border-0"><?php if($mb=="0"){?><span style="color:white; font-size:0px;"><?php echo $mb;?></span><?php }else{echo $mb;}  ?></td></tr><?php }?></table></td>
                    <td><table class="table"><?php foreach($results as $result){ $mc=$result->taxe?><tr class="border-0"><td class="border-0"><?php if($mc=="0"){?><span style="color:white; font-size:0px;"><?php echo $mc;?></span><?php }else{echo $mc;}  ?></td></tr><?php }?></table></td>
                    
                </tr>
            </tbody>
            <thead class="soust">
                <tr>
                <?php $sql = "SELECT  nontaxable,taxable,taxe,tva14,tva20,totalht,sommel,devise,reglement,echeance,totalttc FROM total WHERE ice='$ice' and nomfacture='$nomf' ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

foreach($results as $result){
    
?>      
                    <th>SOUS TOTAUX</th>
                    <?php $ra=$result->nontaxable;?>  <?php if($ra=="0"){?><th><span style="color:white; font-size:0px;"><?php echo $ra;?></span></th><?php }else{?><th><?php echo $ra;?></th><?php }?>
                    <?php $rb=$result->taxable; ?> <?php if($rb=="0"){?><th><span style="color:white; font-size:0px;"><?php echo $rb;?></span></th><?php }else{?><th><?php echo $rb;?></th><?php }?>
                    <?php $rc=$result->taxe;?> <?php if($rc=="0"){?><th><span style="color:white; font-size:0px;"><?php echo $rc;?></span></th><?php }else{?><th><?php echo $rc;?></th><?php }?>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th class="border-0"></th>
                    <th>T.V.A 14%</th>
                    <th></th>
                    <?php $ta=$result->tva14;?>
                    <?php if($ta=="0"){?><th><span style="color:white; font-size:0px;"><?php echo $ta;?></span></th><?php }else{?><th><?php echo $ta;?></th><?php }?>
                    

                </tr>
                <tr>
                    <th class="border-0"></th>
                    <th>T.V.A 20%</th>
                    <th></th>
                    <?php $tb=$result->tva20;?>
                    <th> <?php if($tb=="0"){echo " ";}else{echo $tb;} ?></th>
                </tr>
                <tr>
                    <th></th>
                    <th>TOTAL H.T</th>
                    <th style="border-right:none; width:30%; "><?php echo $result->totalht;?></th>
                    <th style="border-left:none;   "></th>

                </tr>
                
            </thead>
            
        </table>
        <div class="brd"></div>


        <div class="sommep">
            <div id="s1">Arrêtée la présente facture à la somme de:</div>
            <div id="s2"><?php echo $result->sommel;?></div>
        </div>

        <table class="tblf">
            <thead>
                <tr>
                    <th>Devise</th>
                    <th>Mode de règlement</th>
                    <th>Échéance</th>
                    <th>TOTAL TTC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $result->devise;?></td>
                    <td><?php echo $result->reglement;?></td>
                    <td><?php echo $result->echeance;?></td>
                    <td style="font-weight:bold; align-items-right;"><span><?php echo $result->totalttc;}?></span></td>
                </tr>
            </tbody>
            </table>
            
            
    </div>
    <div class="last-section">

    <div class="brd"></div>
    </div>
    <div class="lv1">
        <div style="font-weight:900">AFROWAYS LOGISTICS</div>
        <div>Transport National / International</div>
    </div>
    <div class="lv2"></div>
    <div class="lv2">Adresse : RUE TARAUDANTE COMPLEXE ABRAJ TANJA, BLOC 6 BUREAU N° 31BIS, Tanger Tel : 0642 20 15 63</div>
    <div class="lv3">SARL, AU, Capital : 100 000 Dhs, ICE : 002886063000085 Patente : 57218591, IF : 50501726 RC : 119317</div>
    </section>

</body>

<form action="" method="POST">
    <input  class="printini" type="submit" value="nouvelle facture" name="submit">

</form>
</html>