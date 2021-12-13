<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    </link>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
        <p>
            <h1>info sur le demande d'achat grouper</h1>
        </p>
            <table  border='1' class="table table-striped">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">materiel</td>
                            <th scope="col">quantite</td>
                        </tr>
                    <?php for($i=0;$i<count($demandeGrouper);$i++) { ?>
                        <tr>
                            <td scope="row"><?php echo $i+1; ?></td>
                            <td><?php echo $demandeGrouper[$i]['label'] ?></td>
                            <td><?php echo $demandeGrouper[$i]['quantite'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <!-- <form action="<?php echo site_url('DemandeAchatController/insertProformat'); ?>" method="get">
                        <h2>ajouter un proformat</h2>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">reference</label>
                        <input type="teste" name="reference" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">quantite</label>
                        <input type="texte" name="quantite" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">prix en Ariary</label>
                        <input type="texte" name="prix" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                   </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">date limite</label>
                        <input type="date" name="date" class="form-control" id="exampleInputPassword1">
                    </div>
                    <input type="hidden" name="idDemandeGrouper" value="<?php echo $demandeGrouper[0]['idDemandeGrouper'] ?>" >
                    <div>
                        <select name="idFournisseur">
                        <?php for($i=0;$i<count($listeFournisseur);$i++) { ?>
                            <option value="<?php echo $listeFournisseur[$i]['idFournisseur'] ?>" >
                            <?php echo $listeFournisseur[$i]['nom'] ?>
                            </option>
                        <?php } ?>
                        </select>
                   
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> -->
            
        </div>
        <div class="col">
        <h2>liste des proformats</h2>
        <table border='1' class="table table-striped">
            <tr>
                <th scope="col">#</th>
                <th scope="col">label</td>
                <th scope="col">prix</td>
                <th scope="col">date validite</td>
            </tr>
        <?php for($i=0;$i<count($listeProformat);$i++) { ?>
            <tr>
                <td scope="row"><?php echo $i+1; ?></td>
                <td><?php echo $listeProformat[$i]['label'] ?></td>
                <td><?php echo $listeProformat[$i]['prix'] ?></td>
                <td><?php echo $listeProformat[$i]['dateValidite'] ?></td>
                <td><a class="btn btn-info"  href="<?php echo site_url('DemandeAchatController/genererBondDeCommande'); ?>?id=<?php echo $listeProformat[$i]['id'] ?>">valider proformats et generer bond de commande</a></td>
            </tr>
        <?php } ?>
        </table>
        </div>
        <div class="col-sm-5"> 
        
        </div>
    </div></div>
</body>
</html>