<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo site_url('DemandeAchatController/grouper'); ?>" method="get">
        <table border='1'>
                <tr>
                    <td>materiel</td>
                    <td>quantite</td>
                    <td>unite</td>
                    <td>nom departement</td>
                    <td>etat</td>
                </tr>
            <?php for($i=0;$i<count($demande);$i++) { ?>
                <tr>
                    <td><?php echo $demande[$i]['label'] ?></td>
                    <td><?php echo $demande[$i]['quantite'] ?></td>
                    <td><?php echo $demande[$i]['unite'] ?></td>
                    <td><?php echo $demande[$i]['nom'] ?></td>
                    <td><?php echo $demande[$i]['etat'] ?></td>
                    <td><input type="checkbox" name="aGrouper[]" value="<?php echo $demande[$i]['id'] ?>" id=""></a></td>
                </tr>
            <?php } ?>
        </table>
        <input type="submit" value="grouper">
    </form>
</body>
</html>