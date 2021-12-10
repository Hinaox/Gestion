<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Demande achat</p>
    <form action="<?php echo site_url('DemandeAchatController/insererDemande'); ?>" method="get">

            <p>
                <select name="idDepartement" id="">
                    <?php for ($i =0;$i<count($departement);$i++) { ?>
                    <option value="<?php echo $departement[$i]['idDepartement']; ?>"><?php echo $departement[$i]['nom']; ?></option>
                    <?php } ?>
                </select>
            </p>
            <p>materiel à commander<input type="text" name="labelCommande" id=""></p>
            <p>quantité : <input type="number" name="quantite" id=""> unite <input type="text" name="unite" id=""></p>
          
          <button class="w-100 btn btn-success btn-lg" type="submit">envoyer demande d'achat</button>
          <hr class="my-4">
      </form>
</body>
</html>