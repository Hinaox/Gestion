<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php  echo site_url("assets/css/bootstrap.min.css") ?>" >
	<title>Resultat du  Filtre</title>
</head>
<body>
	<div class="container">
        <br>
        <br>
		<div class="row">
			<h1>Resultat du Filtre des CV : <?php echo count($filtre) ?> Trouvée(s) </h1>
			<table class="table table-hover" border="1">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Age</th>
                        <th>Distance</th>
                        <th>Experience</th>
                        <th>Domaine</th>
                        <th>Situation Matrimoniale</th>
                        <th>Grade</th>
                        <th>Diplome</th>
                        <th>Langue</th>  
                        <th>Action</th>  
                        
                    </tr>
                </thead>
                <?php for($i=0;$i<count($filtre);$i++) {?> 
                <tr>
                    <td><a href="#" > <?php echo $filtre[$i]['nomPersonne']  ?></a> </td>
                    <td> <?php echo $filtre[$i]['age'] ?> </td>
                    <td> <?php echo $filtre[$i]['distance'] ?></td>
                    <td><?php echo $filtre[$i]['nomPosteExperience'] ?></td>
                    <td><?php echo $filtre[$i]['titreDomaine'] ?></td>
                    <td><?php echo $filtre[$i]['matrimonial'] ?></td>
                    <td><?php echo $filtre[$i]['titreGrade'] ?></td>
                    <td><?php echo $filtre[$i]['titreDiplome'] ?></td>
                    <td><?php echo $filtre[$i]['AllLangue'] ?></td>
                    <td><a href="#" class="btn btn-success">Envoyer vers Test</a></td>
                </tr>
                <?php } ?>
            </table>
		</div>
	</div>

</body>
</html>