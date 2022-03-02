
    
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
                        <td><a class="btn btn-info"  href="<?php echo site_url('ControllerAchat/addProformat'); ?>?id=<?php echo $demandeGrouper[$i]['id'] ?>">ajout proformats</a></td>
                        <td><a class="btn btn-info"  href="<?php echo site_url('ControllerAchat/listeProformat?label='.$demandeGrouper[$i]['label'].'&quantite='.$demandeGrouper[$i]['quantite']) ?>">lister proformats</a></td>
                    </tr>
                    </div>
                <?php } ?>
                </div>
            </table>
        </div>
        
        <div class="col col-lg-2">
           
        </div>
    </div>