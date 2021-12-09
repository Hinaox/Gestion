<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fiche</title>
    <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>"  rel="stylesheet" meadia="all">
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" meadia="all">

  </head>
  <body>

    <div class="col-md-6 offset-2">
      <h1 class="offset-4">Fiche de <?php echo $nom ?></h1>
      <p>Nom: <?php echo $nom ?></p>
      <p>Prénom:<?php echo $prenom ?></p>
      <p>Matricule:<?php echo $idEmploye ?></p>
      <p>Département: <?php echo $nomDepartement ?>    Poste: <?php echo $nomPoste ?></p>
      <p>Date de naissance: <?php echo $dtn ?></p>
      <p>Date d'embauche: <?php echo $dateEmbauche ?></p>
      <p>Salaire:<?php echo $montantSalaire ?> Ar</p>
      <a href="#" class="offset-4 btn btn-primary "> Modifier le salaire</a><a href="#" class="offset-1 btn btn-primary">voir sa fiche de paie</a></p>
      <br>
      <p>
        <a href="<?php echo site_url("BPController/listeBulletinEmploye/".$idEmploye."/".$nom) ?>" class="offset-5 btn btn-primary ">Liste de bulletins</a>
        <a href="#" class="offset-1 btn btn-primary ">Elaborer le bulletin de paie</a>
      </p>
    </div>
  </body>
</html>
