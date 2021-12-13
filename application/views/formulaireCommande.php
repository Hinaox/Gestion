<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    var_dump($proformat); ?>
    <form action="<?php echo site_url('DemandeAchatController/genererBondDeCommande'); ?>" method="get">
        <input type="date" name="dateLivraison" id="">
        <input type="quantite" name="quantite" id="">
        <input type="hidden"  name="proformat" value="<?php echo $proformat[0]['idProformat'];  ?>">
    
        <input type="submit" value="generer bon de commande">
    </form>
</body>
</html>