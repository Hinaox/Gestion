<?php
 //var_dump($bonCommande);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>"  rel="stylesheet" meadia="all">
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" meadia="all">
    <link href="<?php echo base_url("assets/style.css"); ?>" rel="stylesheet" meadia="all">
    <title>Document</title>
</head>
<body>
<main role="main">
<div class="row">
    <div class="col-md-1 "></div>
    <div class="col-md-10 order-md-1">
        <h1 class="text-center">Bon de commande</h1></br>
        <div class="mb-5">
        Nom pharmacie</br>
        Lot IV102, Ampasanimalo</br>
        Tel: +261 34 25 256 88</br>
        email: pharmacie@gmail.com
        </div>
        <div class="row">
            <div class="col-md-8 mb-3">
                date
                <?php 
                    $now = new DateTime(null,new DateTimeZone('America/New_York'));
                    echo $now->format('Y-m-d');
                
                ?>
            </div>
            <div class="col-md-4 mb-3">
                Ref commande: 1111
            </div>
        </div>
        <div class="mb-5">
            Fournisseur: <?php echo $bonCommande[0]['nomFornisseur']; ?></br>
            Tel: <?php echo $bonCommande[0]['tel']; ?>
        </div>
        <div class="mb-5">
            <table class="table ">
            <thead>
                <tr>
                <th scope="col">Ref</th>
                <th scope="col">Designation</th>
                <th scope="col">Quantite</th>
                <th scope="col">Unite</th>
                <th scope="col">PU HT</th>
                <th scope="col">Prix total HT</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $somme = 0;
                for($i=0; $i<count($bonCommande); $i++){ 
                    $somme+=$bonCommande[$i]['prixProformat']*$bonCommande[$i]['quantite'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i+1; ?></th>
                        <td><?php echo $bonCommande[$i]['label']; ?></td>
                        <td><?php echo $bonCommande[$i]['quantite']; ?></td>
                        <td>piece(s)</td>
                        <td><?php echo $bonCommande[$i]['prixProformat'] ?></td>
                        <td><?php echo $bonCommande[$i]['prixProformat']*$bonCommande[$i]['quantite']; ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Montant HT</td>
                    <td><?php echo $somme; ?></td>
                </tr><tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>TVA 20%</td>
                    <td><?php echo $somme*20/100; ?></td>
                </tr><tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Montant TTC</td>
                    <td><?php echo $somme+$somme*20/100; ?></td>
                </tr>
            </tbody>
            </table>
        </div>
    <div>
    </div>
</div>
<main role="main">
</body>
</html>