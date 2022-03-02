<h1>liste des produit non valider </h1>
<table class="table">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">label</th>
    </tr>
  </thead>
  <tbody>
      <?php for($i=0;$i<count($ProduitDemander);$i++) { ?>
    <tr>
      <th scope="row"><?php echo $i+1; ?></th>
      <td><?php echo $ProduitDemander[$i]['label']; ?></td>
      <td><a href="<?php echo site_url('ControllerAchat/validerProduit?id='.$ProduitDemander[$i]['id']); ?>" class="btn btn-info">valider</a></td>
    </tr>
    <?php } ?>
    
</table>