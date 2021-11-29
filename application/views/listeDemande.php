<div>
    <?php for($i=0; $i<3; $i++){ ?>   
        </br>
    <?php } ?>
    <h1>Liste des demandes en cours</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID </th>
      <th scope="col">Motif</th>
      <th scope="col">debut</th>
      <th scope="col">fin</th>
      <th scope="col">nb congés demandés</th>
      <th scope="col">congés cumulés</th>
      <th scope="col">congés pris</th>
      <th scope="col">congés restants</th>
      <th scope="col">remarque</th>
      <th scope="col">departement</th>
      <th scope="col">poste</th>
    </tr>
  </thead>
  <tbody>
    <?php for($i=0; $i<count($demandes); $i++){ ?>
        <tr>
        <th scope="row"><?php echo $demandes[$i]['idEmp']; ?></th>
        <td><?php echo $demandes[$i]['description']; ?></td>
        <td><?php echo $demandes[$i]['dateDebut']; ?></td>
        <td><?php echo $demandes[$i]['dateFin']; ?></td>
        <td><?php echo $demandes[$i]['demande']; ?></td>
        <td><?php echo $demandes[$i]['cumule']; ?></td>
        <td><?php echo $demandes[$i]['pris']; ?></td>
        <td><?php echo $demandes[$i]['restant']; ?></td>
        <td><?php echo $demandes[$i]['remarque']; ?></td>
        <td><?php echo $demandes[$i]['nomDepartement']; ?></td>
        <td><?php echo $demandes[$i]['nomPoste']; ?></td>
        <form action="<?php echo site_url('DemandeCongeCtrl/accepter') ?>" method="post">
            <input type="hidden" name="idDemande" value="<?php echo $demandes[$i]['id']; ?>" />
            <input type="hidden" name="dateDebut" value="<?php echo $demandes[$i]['dateDebut']; ?>" />
            <input type="hidden" name="idDepartement" value="<?php echo $demandes[$i]['idDepartement']; ?>" />
            <td><button class="w-100 btn btn-success btn-lg" type="submit" >Accepter</button></td>
        </form>
        <form action="<?php echo site_url('DemandeCongeCtrl/refuser') ?>" method="post">
            <input type="hidden" name="idDemande" value="<?php echo $demandes[$i]['id']; ?>" />
            <td><button class="w-100 btn btn-danger btn-lg" type="submit">Refuser</button></td>
        </form>
        </tr>
    <?php } ?>
  </tbody>
</table>
<?php if(isset($reponse)){ ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $reponse;?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
</div>

