<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="<?php  echo site_url("assets/css/bootstrap.min.css") ?>" >
	
	<title>Resultat</title>
</head>
<body>
	<div class="container">
        <br>
        <br>
		<div class="row">
            

			<h1>Liste des admis pour avoir un entretien </h1>
			<table class="table table-hover" border="1">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Note</th>
                        <th>Date entretien</th>
                        <th>Heure entretien</th>
                        <th>validation</th>
                    </tr>
                </thead>
                <?php for($i=0;$i<count($personne);$i++){?>
                    <form  action="<?php echo site_url('PersonneController/insertentretien'); ?>" method="post">
                <tr>
                    <td><a href="#" > <?php echo $personne[$i]['nom'];?></a> </td>
                    <td> <input class="form-control" type="number" min="0" max="100" name="note" placeholder="/100"></td> 
                    
                     <td> <input type="date" name="date" /></td>
                    <td><input type="time" max="18:00" min="08:00"  name="heure"></td>
       
                   <input type="hidden" name="idPersonne" value="<?php echo $personne[$i]['idPersonne'];?>">
                   <td> <input type="submit" value="OK" class="btn btn-primary"></td>
                </tr>
                </form>
                <?php } ?>
            </table>
            
            <div class="col-sm-10">
                 <form  action="<?php echo base_url('PersonneController/afficheEntretien'); ?>" method="post">
                          <input type="submit" class="btn btn-primary" value="voir liste admis entretien">
                          </form>
                        </div>
            
		</div>
	</div>

</body>

</html>
