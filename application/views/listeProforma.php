
    <div class="row">
        <div class="col">
        <p>
            <h1>info sur le demande d'achat grouper</h1>
        </p>
        <div class="card-body">
            <p class="card-text">label : <?php echo $label ?></p>
            <p class="card-text">quantite : <?php echo $quantite ?></p>
        </div>
            
        </div>
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
                <td><a class="btn btn-info"  href="
                <?php echo site_url('ControllerAchat/formulaireBonDeCommande'); ?>?
                id=<?php echo $listeProformat[$i]['id'] ?>
                ">
                valider proformats</a></td>
            </tr>
        <?php } ?>
        </table>
        </div>
        <div class="col-sm-5"> 
        
        </div>
    