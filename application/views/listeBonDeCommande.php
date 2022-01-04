<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>"  rel="stylesheet" meadia="all">
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" meadia="all">
    <link href="<?php echo base_url("assets/style.css"); ?>" rel="stylesheet" meadia="all">
    <title>Document</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10">
			<h2>Liste des bons de commande</h2>
				<br>
				<table class="table">
					<thead>
						<th>id</th>
						<th>id Proformat</th>
						<th>date de Commande</th>
						<th>quantite</th>
						<th>delai de livraison</th>
					</thead>
						<?php for($i=0; $i<count($bdc); $i++) { ?>
							<tr>
								<td><?php echo $bdc[$i]['idBonDeCommande'] ?></td>
								<td><?php echo $bdc[$i]['idProformat'] ?></td>
								<td><?php echo $bdc[$i]['dateCommande'] ?></td>
								<td><?php echo $bdc[$i]['quantite'] ?></td>
								<td><?php echo $bdc[$i]['delaiLivraison'] ?></td>
								<td><a href="<?php echo site_url("livraisonController/livrer?idBdc=".$bdc[$i]['idBonDeCommande']); ?>"><input type="submit" class="btn-primary" value="Livrer"/></a></td>
							</tr>
						<?php } ?>
				</table>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">
				<h2>Liste des bons de commande livrés</h2>
				<br>
				<table class="table">
					<thead>
						<th>id</th>
						<th>id Proformat</th>
						<th>date de Commande</th>
						<th>quantite</th>
						<th>delai de livraison</th>
					</thead>
						<?php for($i=0; $i<count($bdcNonLivre); $i++) { ?>
							<tr>
								<td><?php echo $bdcNonLivre[$i]['idBonDeCommande'] ?></td>
								<td><?php echo $bdcNonLivre[$i]['idProformat'] ?></td>
								<td><?php echo $bdcNonLivre[$i]['dateCommande'] ?></td>
								<td><?php echo $bdcNonLivre[$i]['quantite'] ?></td>
								<td><?php echo $bdcNonLivre[$i]['delaiLivraison'] ?></td>
							</tr>
						<?php } ?>
				</table>
			</div>
		</div>	
	</div>
</body>
</html>