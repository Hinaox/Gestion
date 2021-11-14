<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php  echo site_url("assets/css/bootstrap.min.css") ?>" >
	
	<!-- <link rel="stylesheet" href="css/style.css"> -->
	<title>Filtre du CV</title>
</head>
<body>
	<div class="container h-100">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				
				<h1 style="text-align: center;">Filtre Cv </h1>
				<br>
				<h5>Tous les champs ne sont pas obligatoires</h5>
				<br>
				<form  action="<?php echo site_url('FiltreController/filtreCV'); ?>" method="post">


					<!-- situation matri -->
					  	<div class="form-group row">
					    	<label for="inputEmail3" class="col-sm-2 col-form-label">Situation Matrimoniale</label>
					    	<div class="col-sm-10">
						      	<select id="inputEmail3" class="form-control" name="matrimoniale">
						      		<option value="">Tous</option>
						        	<option value="celibataire">Celibataire</option>
						        	<option value="Mariée">Mariée</option>
						        	<option value="Marié">Marié</option>
						      	</select>
						    </div>
					  	</div>
					 <!--fin situation matri -->

					 <!-- diplome -->
					  	<div id="ajout_de_diplome">
						  	<div class="form-group row">
						    	<label for="inputEmail3" class="col-sm-2 col-form-label">Diplome</label>
							    <div class="col">
							    	<select id="inputEmail3" class="form-control" name="diplome">
							      		<option value="">Tous</option>
							        	<option value="BACC">Bac</option>
							        	<option value="License">License</option>
							        	<option value="MASTER">Master</option>
							      	</select>
						      	</div>
						      	<div class="col">
							    	<select id="inputEmail3" class="form-control" name="diplome">
						      		<option value="">Tous</option>
							        	<option value="1e annee">1e annee</option>
							        	<option value="2e annee">2e annee</option>
							        	<option value="3e annee">3e annee</option>
							        	<option value="4e annee">4e annee</option>
							        	<option value="5e annee">5e annee</option>
							      	</select>
							      <!-- <button class="btn btn-secondary" id="ajouterDiplome">Ajouter Diplome</button> -->     
							    </div>
						  	</div>
						  	<div id="diplome_ajout">
							  	
					  		</div>
					  	</div>


				  	<!-- fin diplome -->

				  	<!-- Age -->
					  	<div class="form-group row">
					    	<label for="inputPassword3" class="col-sm-2 col-form-label">Age minimum</label>
					    	<div class="col">
								<input class="form-control" type="number" name="ageMin" placeholder="min">
							</div>	
					  	</div>
					<!-- fin age  -->

				  	<div class="form-group row">
				    	<label for="inputPassword3" class="col-sm-2 col-form-label">Distance</label>
				    	<div class="col">
							<input class="form-control" type="number" name="distanceMax" placeholder="max (en km)">
						</div>	
						
				  	</div>
				  	
				  	<fieldset class="form-group">
					    <div class="row">
					      	<legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
					      	<div class="col-sm-10">
					      		<div class="form-check">
						          <input class="form-check-input" type="radio" name="sexe" id="gridRadios1" value="" checked>
						          	<label class="form-check-label" for="gridRadios1">Tous</label>
						        </div>
						        <div class="form-check">
						        	
						          	<input class="form-check-input" type="radio" name="sexe" id="gridRadios1" value="H" >
						          	<label class="form-check-label" for="gridRadios1">Homme</label>
						        </div>
						        <div class="form-check">
						          <input class="form-check-input" type="radio" name="sexe" id="gridRadios2" value="F">
						          <label class="form-check-label" for="gridRadios2">Femme</label>
						        </div>
					      	</div>
					    </div>
				  	</fieldset>


				  	<div class="form-group row">
				    	<label for="inputPassword3" class="col-sm-2 col-form-label">Langue</label>
				    	<div class="form-group col-md">
						      <button class="btn btn-secondary" id="ajouterLangue">Ajouter Langue</button>
						    </div>
				  	</div>
				  	<div  id="langue_ajout">
				  		
				    </div>


				  	<div class="form-group row">
				    	<label for="inputPassword3" class="col-sm-2 col-form-label">Poste occupee</label>
				    	<div class="col">
							<select  class="form-control" name="poste">
						        	<option value="">Tous</option>
						        	<option value="caissier">caissier</option>
						        	<option value="Comptable">Comptable</option>
						        	<option value="responsable marketing">Responsable marketing</option>
						        	<option value="infirmiere">infirmiere</option>
						        	
						    </select>
						</div>	
						<div class="col">
							<div class="col">
						      	<select id="inputEmail3" class="form-control" name="domaine">
						        	<option value="">Domaine</option>
						        	<option value="financier">financier</option>
						        	<option value="communication">communication</option>
						        	<option value="science">science</option>
						      	</select>
						    </div>
						</div>
				  	</div>
				  	<div class="form-group row">
					    <div class="col-sm-10">
					      <button type="submit" class="btn btn-primary">Filtrer</button>
					    </div>
				  	</div>
				</form>


				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>


</body>
<script type="text/javascript" src="<?php  echo site_url("assets/js/jquery-3.4.1.min.js") ?>"></script>
<!-- <script src="js/app.js"></script> -->
<?php
		$tab = array("test","test2");


?>
<script type="text/javascript">

		var tableau = new Array(<?php  echo count($tab)?>);
		<?php for( $i=0;$i<count($tab);$i++) { ?>
				tableau[<?php echo $i ?>] = "<?php echo $tab[$i] ?>";
		<?php } ?>
		?>
		


$(document).ready(function(){

	var $i_diplo=1;
	var $i_langue=1;
	console.log($i_diplo);

	//ajout et suppression de diplome


	$('#ajouterDiplome').click(function(e){
		console.log('niditra');
		console.log($i_diplo);
		$i_diplo++;	
		e.preventDefault();
		$('#diplome_ajout').append('<div class="form-group row" id="diplome_ajouter"><label for="inputPassword3" class="col-sm-2 col-form-label"></label><div class="col"><select id="inputEmail3" class="form-control"><option selected>License</option><option>...</option></select></div><div class="col"><select id="inputEmail3" class="form-control"><option selected>Domaine </option><option>...</option></select></div><div class="col"><button class="btn btn-success">Valider</button></div><div class="col"><button class="btn btn-danger" class="suppressionDiplome">X</button></div></div>')
	});

	$('.suppressionDiplome').click(function(e){
		e.preventDefault();
		//console.log($i_diplo)
		// console.log($(this).parent('div').attr('id')+$i_diplo);
		// var  suppr = $(this).parent('div').attr('id');
		// console.log(suppr);
		// $('#'+suppr+$i_diplo).remove();
		//$('#diplome_ajouter').remove();
		console.log($(this).parent('div'));
		$(this).parent('div').remove();
		$i_diplo--;
	})

	//ajout et suppression de langue

	$('#ajouterLangue').click(function(e){
		e.preventDefault();
		$('#langue_ajout').append('<div class="form-group row" id="langue_ajout"><label for="inputPassword3" class="col-sm-2 col-form-label"></label><div class="col"><select id="inputEmail3" class="form-control"><option selected>Anglais</option><option>...</option></select></div><div class="col"><input class="form-control" type="number" name="poste" placeholder="niveau"></div><div class="col"><button class="btn btn-success">Valider</button></div><div class="col"><button class="btn btn-danger" id="suppressionLamgue'+$i_langue+'">X</button></div></div>')
		$i_langue++;
	});
})

</script>
</html>