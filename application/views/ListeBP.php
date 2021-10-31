<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="<?php echo site_url("application/bootstrap/css/bootstrap.css")?> rel="stylesheet"> -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <title>Bulletin De Paie</title>
</head>

<body>
    <div class="container">
        <div class="py-5 text-center">

            <h2>Liste Bulletin De Paie</h2>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom Prenom</th>
                    <th scope="col">Ref Bulletin</th>
                    <th scope="col">Date</th>
                    <th scope="col">Net a Payer</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <?php for($i=0;$i<count($listeBP);$i++) {?>
                    <tr>
                        <th scope="row"><?php echo $i+1 ;?></th>
                        <td><?php echo $listeBP[$i]['nom']." ".$listeBP[$i]['prenom'] ;?></td>
                        <td><?php echo $listeBP[$i]['idFichePaie'] ;?></td>
                        <td><?php echo $listeBP[$i]['dateMiseEnPlace'] ;?></td>
                        <td><?php echo $listeBP[$i]['net'] ;?>AR</td>
                        <td><a class="btn btn-info" href=<?php echo site_url("BPController/getBP?idFichePai=".$listeBP[$i]['idFichePaie']);?> role="button">INFO</a></td>                    </tr>
                <?php }?>
            </tbody>
        </table>
        <a href="#" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Retour</a>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>