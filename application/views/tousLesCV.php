<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css" >
	<title>Liste de tous les CV</title>
</head>
<body>
	<div class="container">
        <br>
        <br>
		<div class="row">
			<h1>Liste de tous les CV</h1>
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
            <form action ="<?php echo site_url('FiltreCVController/'); ?>" action="get">
                <button>Filtrer</button>
            </form>
		</div>
	</div>

</body>
</html>