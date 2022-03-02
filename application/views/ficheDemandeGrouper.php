
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
                <form action="<?php echo site_url('ControllerAchat/insertProformat'); ?>" method="get">
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
                    <input type="hidden" name="idDemandeGrouper" value="<?php echo $demandeGrouper[0]['id'] ?>" >
                    <div>
                        <select name="idFournisseur" class="custom-select">
                        <?php for($i=0;$i<count($listeFournisseur);$i++) { ?>
                            <option value="<?php echo $listeFournisseur[$i]['idFournisseur'] ?>" >
                            <?php echo $listeFournisseur[$i]['nom'] ?>
                            </option>
                        <?php } ?>
                        </select>
                   
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
        </div>
        <div class="col-sm-5"> 
        
        </div>
    </div>