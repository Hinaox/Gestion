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
    
    <div class="row justify-content-md-center">
        <div class="col col-lg-2">
        </div>
        <div class="col-md-auto">
        <p>
            <h1>liste des demandes d'achat grouper/valider</h1>
        </p>
            <table border='1' class="table table-striped">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">materiel</td>
                        <th scope="col">quantite</td>
                        <th scope="col"></td>
                    </tr>
                    <div class="accordion" >
                <?php for($i=0;$i<count($demandeGrouper);$i++) { ?>
                    <div class="accordion-item">
                    <tr class="accordion-header">
                        <td scope="row"><?php echo $i+1; ?></td>
                        <td><?php echo $demandeGrouper[$i]['label'] ?></td>
                        <td><?php echo $demandeGrouper[$i]['quantite'] ?></td>
                        <td><a class="btn btn-info"  href="<?php echo site_url('DemandeAchatController/ficheDemandeGrouer'); ?>?id=<?php echo $demandeGrouper[$i]['idDemandeGrouper'] ?>">ajout proformats</a></td>
                        <td><a class="btn btn-info"  href="<?php echo site_url('DemandeAchatController/listeProformat'); ?>?id=<?php echo $demandeGrouper[$i]['idDemandeGrouper'] ?>">lister proformats</a></td>
                    </tr>
                    </div>
                <?php } ?>
                </div>
            </table>
        </div>
        
        <div class="col col-lg-2">
           
        </div>
        <!-- <div class="col-sm-5">  -->
        <!-- <table border='1' class="table table-striped">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">nom</td>
                            <th scope="col">categorie</td>
                            <th scope="col">tel</td>
                            <th scope="col">mail</td>
                            <th scope="col">addresse</td>
                        </tr>
                    <?php for($i=0;$i<count($listeFournisseur);$i++) { ?>
                        <tr>
                            <td scope="row"><?php echo $i+1; ?></td>
                            <td><?php echo $listeFournisseur[$i]['nom'] ?></td>
                            <td><?php echo $listeFournisseur[$i]['label'] ?></td>
                            <td><?php echo $listeFournisseur[$i]['tel'] ?></td>
                            <td><?php echo $listeFournisseur[$i]['mail'] ?></td>
                            <td><?php echo $listeFournisseur[$i]['addresse'] ?></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </table>
        </div> -->
    </div>
</body>
</html>