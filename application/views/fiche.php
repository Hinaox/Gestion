<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(base_url("assets/phpqrcode/qrlib.php"));
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
      <img src="<?php echo $photo ?>" alt="profile">
      <p>Nom: <?php echo $nom ?></p>
      <p>Prénom:<?php echo $prenom ?></p>
      <p>Matricule:<?php echo $matricule ?></p>
      <p>Département:...    Poste: </p>
      <p>Date d'embauche:</p>
      <p>Salaire:</p>
      <a href="#">voir sa fiche de paie</a>
      <br>
      <button type="button" name="button">Liste de bulletins</button>
      <button type="button" name="button">Elaborer le bulletin de paie</button>
      <br>
      <button type="button" name="button">Modifier le salaire</button>
    </div>
  </body>
</html>
