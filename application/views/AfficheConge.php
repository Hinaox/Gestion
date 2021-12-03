<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
</head>
<body>
<div class="bg-light">
   <center> <h1 style="color: MenuText"> Etat congé de <?php echo $congeEmpl[0]->getNom()?> <?php echo $congeEmpl[0]->getPrenom()?> </h1> </center>
</div>
<h4 style="color: #818182">Date d'embauche : <?php echo $congeEmpl[0]->getDateEmbauche() ?></h4>
<h3 style="color: #009999">Conge déductible</h3>
<h4>nombre congé deductible cette année :  <?php echo $nombreCongeDed ?> jours </h4>
<table class="table table-bordered" style="width: 1200px;border-width: 50px;border-color: white">
    <thead class="thead-dark">
    <tr>
        <th>date de Debut</th>
        <th>date de fin</th>
        <th>description</th>
        <th>deductibilite</th>
        <th>Nombre de Jour</th>
    </tr>
    </thead>
    <?php for($i=0;$i<count($congeEmpl);$i++) {?>
        <?php if ($congeEmpl[$i]->getDeductibilite()=='oui') {?>
            <tr style="background-color: #9fcdff">
                <th style="color: #a61717"><?php echo $congeEmpl[$i]->getDateDebut()?></th>
                <th style="color: #cd6e00"><?php echo $congeEmpl[$i]->getDateFin()?></th>
                <th><?php echo $congeEmpl[$i]->getDescription()?></th>
                <th style="color: #2e8ece"><?php echo $congeEmpl[$i]->getDeductibilite()?></th>
                <th style="color: #2e8ece"><?php echo $congeEmpl[$i]->getNbrJour()?> jours</th>
            </tr>
        <?php }?>
    <?php }?>
</table>

<h3 style="color: #009999">Conge Non déductible</h3>
<h4>nombre congé non deductible cette année :  <?php echo $nombreCongeNDed ?> jours</h4>
<table class="table table-bordered" style="width: 1200px;border-width: 50px;border-color: white">
    <thead class="thead-dark">
    <tr>
        <th>date de Debut</th>
        <th>date de fin</th>
        <th>description</th>
        <th>deductibilite</th>
        <th>Nombre de Jour</th>
    </tr>
    </thead>
    <?php for($i=0;$i<count($congeEmpl);$i++) {?>
        <?php if ($congeEmpl[$i]->getDeductibilite()=='non') {?>
            <tr style="background-color: #9fcdff">
                <th style="color: #a61717"><?php echo $congeEmpl[$i]->getDateDebut()?></th>
                <th style="color: #cd6e00"><?php echo $congeEmpl[$i]->getDateFin()?></th>
                <th><?php echo $congeEmpl[$i]->getDescription()?></th>
                <th style="color: #2e8ece"><?php echo $congeEmpl[$i]->getDeductibilite()?></th>
                <th style="color: #2e8ece"><?php echo $congeEmpl[$i]->getNbrJour()?> jours</th>
            </tr>
        <?php }?>
    <?php }?>
</table>
<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
