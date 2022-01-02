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
   
    <title>Document</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col-6">
    <H2>Formulaire de demande d'achat</H2>
        <form action="<?php echo site_url('DemandeAchatController/insererDemande'); ?>" method="get">
            <p>Departement
                <select name="idDepartement" id="">
                    <?php for ($i =0;$i<count($departement);$i++) { ?>
                    <option value="<?php echo $departement[$i]['idDepartement']; ?>"><?php echo $departement[$i]['nom']; ?></option>
                    <?php } ?>
                </select>
            </p>
            <!-- <p>materiel à commander<input type="text" name="labelCommande" id=""></p> -->
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">materiel à commander</span>
                <input type="text" name="labelCommande" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="row">
                <div class="col">
                    <input type="number" name="quantite" class="form-control" placeholder="quantite" aria-label="First name">
                </div>
                <div class="col">
                    <input type="text" name="unite" class="form-control" placeholder="unite" aria-label="Last name">
                </div>
            </div>
            <!-- <p>quantité : <input type="number" name="quantite" id=""> unite <input type="text" name="unite" id=""></p> -->
            <div>        
                <button class="w-50 btn btn-success" type="submit">envoyer demande d'achat</button>
            </div> 
      </form>
    </div>
    <div class="col">
      
    </div>
  </div>
</div>
    
   
</body>
</html>