<?php
 
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
            Fournisseur: Pharmacie Havana</br>
            Tel: +261 34 00 111 11
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
                <?php for($i=0; $i<3; $i++){ ?>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>5</td>
                        <td>boite(s)</td>
                        <td>1000</td>
                        <td>5000</td>
                    </tr>
                <?php } ?>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Montant HT</td>
                    <td>15000</td>
                </tr><tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>TVA 20%</td>
                    <td>3000</td>
                </tr><tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Montant TTC</td>
                    <td>18000</td>
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