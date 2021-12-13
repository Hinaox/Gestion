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
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">quantite</label>
                        <input type="texte" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">reference</label>
                        <input type="teste" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">date limite</label>
                        <input type="date" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            
        </div>
        <div class="col">
        <h2>liste des fournisseur</h2>
        <table border='1' class="table table-striped">
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
            </tr>
        <?php } ?>
        </table>
        <form action="" method="get">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </form>
        </div>
        <div class="col-sm-5"> 
        
        </div>
    </div></div>
</body>
</html>