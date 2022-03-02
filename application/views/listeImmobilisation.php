
    <h1>liste des immobilisations  </h1>
<table class="table">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">label</th>
      <th scope="col">dateAquisition</th>
      <th scope="col">duree d'ammortissement</th>
      <th scope="col">valeur (Ar)</th>
      <th scope="col">valeur actuelle (Ar)</th>
    </tr>
  </thead>
  <tbody>
      <?php for($i=0;$i<count($immobilisation);$i++) { ?>
        <td><?php echo $i+1; ?></td>
      <td><?php echo $immobilisation[$i]['label']; ?></td>
      <td><?php echo $immobilisation[$i]['dateAquisition']; ?></td>
      <td><?php echo $immobilisation[$i]['ammortissement']; ?></td>
      <td><?php echo $immobilisation[$i]['valeur']; ?></td>
      <td><a href="<?php echo site_url('ImmobilisationController/ficheImmobilisation?id='.$immobilisation[$i]['id']); ?>"><?php echo $immobilisation[$i]['valeurActuelle']; ?></a></td>
      <
    </tr>
    <?php } ?>
    <a href="<?php echo base_url("DemandeAchatController"); ?>">gener une nouvelle demande</a>
</table>