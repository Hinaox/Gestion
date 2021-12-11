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
    <p>
        <h1>liste des demandes d'achat non grouper/valider</h1>
    </p>
    <form action="<?php echo site_url('DemandeAchatController/grouper'); ?>" method="get">
        <table border='1' class="table table-striped">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">materiel</td>
                    <th scope="col">quantite</td>
                    <th scope="col">unite</td>
                    <th scope="col">nom departement</td>
                    <th scope="col">etat</td>
                </tr>
            <?php for($i=0;$i<count($demande);$i++) { ?>
                <tr>
                    <td scope="row"><?php echo $i+1; ?></td>
                    <td><?php echo $demande[$i]['label'] ?></td>
                    <td><?php echo $demande[$i]['quantite'] ?></td>
                    <td><?php echo $demande[$i]['unite'] ?></td>
                    <td><?php echo $demande[$i]['nom'] ?></td>
                    <td><?php echo $demande[$i]['etat'] ?></td>
                    <td  class="form-check"><input class="form-check-label" type="checkbox" name="aGrouper[]" value="<?php echo $demande[$i]['id'] ?>" id=""></td>
                </tr>
            <?php } ?>
        </table>
        <input type="submit" class="btn btn-primary" value="grouper/valider">
    </form>
</body>
</html>