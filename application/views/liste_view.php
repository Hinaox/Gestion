
	<div class="container">
		<div class="row">
            

			<h1>Resultats des entretiens</h1>
			<table class="table table-hover" border="1">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Note</th>
                        <th>Date entretien</th>
                        <th>Heure entretien</th>
                    </tr>
                </thead>
                <?php for($i=0;$i<count($entretien);$i++){?>
                <tr>
                    <td><a href="ficheCV" >  <?php echo $entretien[$i]['nom'];?> </a></td>
                    <td> <?php echo $entretien[$i]['note'];?> </td>
                    <td> <?php echo $entretien[$i]['dateentretien'];?> </td>
                    <td> <?php echo $entretien[$i]['heureentretien'];?> </td>
       
                   
                </tr>
                <?php } ?>
            </table>
           
            <button><a href="<?php echo base_url() ?>PersonneController">Retour</a></button>
		</div>
	</div>
