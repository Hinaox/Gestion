<?php for($i=0; $i<3; $i++){ echo "</br>"; } ?>

<?php if ($congeEmpl != null){ ?>
    <div class="bg-light">
    <center> <h1 style="color: MenuText"> Etat de congé de <?php echo $congeEmpl[0]['nom']?> <?php echo $congeEmpl[0]['prenom']?> </h1> </center>
    </div>
    <p>ID : <?php echo $congeEmpl[0]['idEmp'] ?></p>
    <p>Date d'embauche : <?php echo $congeEmpl[0]['dateEmbauche'] ?></p>
    <h3 style="color: #009999">Conge déductible</h3>
    <p>durée congé deductible cette année :  <?php echo $nombreCongeDed ?> heures (<?php echo $nombreCongeDed/24 ?> jours) </p>
    <table class="table table-bordered" style="width: 1200px;border-width: 50px;border-color: white">
        <thead class="thead-dark">
        <tr>
            <th>date de Debut</th>
            <th>date de fin</th>
            <th>description</th>
            <th>deductibilite</th>
            <th>Durée en minutes</th>
        </tr>
        </thead>
        <?php for($i=0;$i<count($congeEmpl);$i++) {?>
            <?php if ($congeEmpl[$i]['deductibilite']=='oui') {?>
                <tr style="background-color: #9fcdff">
                    <th style="color: #a61717"><?php echo $congeEmpl[$i]['dateDebut']?></th>
                    <th style="color: #cd6e00"><?php echo $congeEmpl[$i]['dateFin']?></th>
                    <th><?php echo $congeEmpl[$i]['description']?></th>
                    <th style="color: #2e8ece"><?php echo $congeEmpl[$i]['deductibilite']?></th>
                    <th style="color: #2e8ece"><?php echo $congeEmpl[$i]['NbrHeure']?> heures (<?php echo $congeEmpl[$i]['NbrHeure']/24?>jours)</th>
                </tr>
            <?php }?>
        <?php }?>
    </table>

    <h3 style="color: #009999">Conge Non déductible</h3>
    <p>durée de congé non deductible cette année :  <?php echo $nombreCongeNDed ?> heures (<?php echo $nombreCongeNDed/24 ?> jours)</p>
    <table class="table table-bordered" style="width: 1200px;border-width: 50px;border-color: white">
        <thead class="thead-dark">
        <tr>
            <th>date de Debut</th>
            <th>date de fin</th>
            <th>description</th>
            <th>deductibilite</th>
            <th>Durée en minutes</th>
        </tr>
        </thead>
        <?php for($i=0;$i<count($congeEmpl);$i++) {?>
            <?php if ($congeEmpl[$i]['deductibilite']=='non') {?>
                <tr style="background-color: #9fcdff">
                <th style="color: #a61717"><?php echo $congeEmpl[$i]['dateDebut']?></th>
                    <th style="color: #cd6e00"><?php echo $congeEmpl[$i]['dateFin']?></th>
                    <th><?php echo $congeEmpl[$i]['description']?></th>
                    <th style="color: #2e8ece"><?php echo $congeEmpl[$i]['deductibilite']?></th>
                    <th style="color: #2e8ece"><?php echo $congeEmpl[$i]['NbrHeure']?> heures (<?php echo $congeEmpl[$i]['NbrHeure']/24?>jours)</th>
                </tr>
            <?php }?>
        <?php }?>
    </table>
<?php } else{ ?>
    Cet employe n'a pas encore demandé de congé
<?php } ?>
