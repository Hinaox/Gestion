
	<div class="container">
		<div class="row">
			<h1>Attribution de note à l'entretien</h1>
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
                   <!-- <td><a class="btn btn-danger" href="<?php //echo site_url('PersonneController/refuserEntretien?idAttente='.$personne[$i]['idAttente']); ?>">Refuser</a></td> -->
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

