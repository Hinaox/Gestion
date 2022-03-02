<div class="card-body">
    <h5 class="card-title">Fiche immobilisation</h5>
    <p class="card-text">label : <?php echo $immobilisation['label'] ?></p>
    <p class="card-text">date d'aquisition :<?php echo $immobilisation['dateAquisition'] ?></p>
    <p class="card-text">ammortissement :sur  <?php echo $immobilisation['ammortissement'] ?> ans</p>
    <p class="card-text">valeur d'origine :<?php echo $immobilisation['valeur'] ?></p>
    <p class="card-text">année d'utilisation :<?php echo $immobilisation['dureExpirer'] ?></p>

  </div>

  <table class="table">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">annee</th>
      <th scope="col">valeur</th>
    </tr>
  </thead>
  <tbody>
      <?php for($i=0;$i<count($fiche);$i++) { ?>
    
      <th scope="row"><?php echo $i+1; ?></th>
      <td><?php echo $fiche[$i]['annee']; ?></td>
      <td><?php echo $fiche[$i]['valeur']; ?></td>
    </tr>
    <?php } ?>
</table>