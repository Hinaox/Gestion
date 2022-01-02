<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>"  rel="stylesheet" meadia="all">
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" meadia="all">
   
    <title>Document</title>
</head>
<body>
    <h1>liste des demandes du departement  </h1>
<table class="table">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">label</th>
      <th scope="col">quantite</th>
      <th scope="col">unite</th>
      <th scope="col">etat</th>
    </tr>
  </thead>
  <tbody>
      <?php for($i=0;$i<count($listeDemande);$i++) { ?>
    <tr <?php if($listeDemande[$i]['etat']=='refuser') { echo 'class="table-danger"'; } ?>>
      <th scope="row"><?php echo $i+1; ?></th>
      <td><?php echo $listeDemande[$i]['label']; ?></td>
      <td><?php echo $listeDemande[$i]['quantite']; ?></td>
      <td><?php echo $listeDemande[$i]['unite']; ?></td>
      <td><?php echo $listeDemande[$i]['etat']; ?></td>
    </tr>
    <?php } ?>
    <a href="<?php echo base_url("DemandeAchatController"); ?>">gener une nouvelle demande</a>
</table>
</body>
</html>