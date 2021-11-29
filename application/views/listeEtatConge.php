
    <?php for($i=0; $i<3; $i++){ ?>   
        </br>
    <?php } ?>
    <h2>Etat de congé</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID </th>
      <th scope="col">date d'embauche</th>
      <th scope="col">nb années de travail</th>
      <th scope="col">congés cumulés</th>
      <th scope="col">congés pris</th>
      <th scope="col">congés restants</th>
      <th scope="col">remarque</th>
    </tr>
  </thead>
  <tbody>
    <?php for($i=0; $i<count($etat); $i++){ ?>
        <tr>
        <th scope="row"><?php echo $etat[$i]['idEmploye']; ?></th>
        <td><?php echo $etat[$i]['dateEmbauche']; ?></td>
        <td><?php echo $etat[$i]['anneeTravail']; ?></td>
        <td><?php echo $etat[$i]['cumule']; ?></td>
        <td><?php echo $etat[$i]['pris']; ?></td>
        <td><?php echo $etat[$i]['restant']; ?></td>
        <td><?php echo $etat[$i]['remarque']; ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>