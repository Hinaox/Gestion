
	<div class="container">
		<div class="row">
            

			<h1>Les nouveaux recruts de l'entreprise</h1>
			<table class="table table-hover" border="1">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date entretien</th>
                        <th>Note à l'entretien</th>
                        <th></th>
                    </tr>
                </thead>
                <?php for($i=0;$i<count($liste);$i++){?>
                    <form action="<?php echo site_url('ContratCtrl') ?>" method="post">
                    <tr>
                        <td><?php echo $liste[$i]['nom'];?></td>
                        <td> <?php echo $liste[$i]['prenom'];?> </td>
                        <td> <?php echo $liste[$i]['dateentretien'];?> </td>
                        <td> <?php echo $liste[$i]['note'];?> </td>
                        <input type="hidden" name="idEmploye" value="<?php echo $liste[$i]['idPersonne'];?>" >
                        <?php if ($this->session->userdata('employe')!=null){ ?>
                            <td><button type="submit">Etablir un contrat de travail</button><td>
                        <?php } ?>
                    </tr>
                    </form>
                <?php } ?>
            </table>
           
		</div>
	</div>
