<div>
    <?php for($i=0; $i<3; $i++){ ?>   
        </br>
    <?php } ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID </th>
      <th scope="col">Motif</th>
      <th scope="col">debut</th>
      <th scope="col">fin</th>
      <th scope="col">demandés</th>
      <th scope="col">cumulés</th>
      <th scope="col">pris</th>
      <th scope="col">restants</th>
      <th scope="col">remarque</th>
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
        <form action="DemandeCongeCtrl/accepter" method="post">
            <input type="hidden" name="idDemande" value="<?php echo $demandes[$i]['id']; ?>" />
            <td><button class="w-100 btn btn-success btn-lg" type="submit">Accepter</button></td>
        </form>
        <form action="DemandeCongeCtrl/refuser" method="post">
            <input type="hidden" name="idDemande" value="<?php echo $demandes[$i]['id']; ?>" />
            <td><button class="w-100 btn btn-danger btn-lg" type="submit">Refuser</button></td>
        </form>
        </tr>
    <?php } ?>
  </tbody>
</table>
</div>