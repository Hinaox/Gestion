<div class="container">

      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h2>Modification Salaire</h2>
        <p class="lead">Formulaire de modification de salaire</p>
      </div>

      <form action="<?php echo site_url('ModifierSalaire/modification'); ?>" method="get">
          <input type="hidden" name="idEmploye" value="<?php echo $employe['idEmploye'];?>">
          <div class="col-md-7 col-lg-8">
            <p class="mb-4"><b>Employé : </b> <?php echo $employe['nom'];?> </p>
          </div>
          <div class="col-md-7 col-lg-8">
            <p class="mb-4"><b>Matricule : </b> <?php echo $employe['idEmploye'];?> </p>
          </div>
          <div class="col-md-7 col-lg-8">
            <p class="mb-4"><b>Departement : </b> <?php echo $employe['nomDepartement'];?> </p>
          </div>
          <div class="col-md-7 col-lg-8">
            <p class="mb-4"><b>Ancien Salaire : </b> 
            <?php if (count($montant)>0){
                echo $montant['montant']."<b> Ar</b>" ;
            } ?> 
            </p>
          </div>
          <div class="col-md-7 col-lg-8">
          <label for="min" class="form-label"><b>Nouveau Salaire: </b></label>  
                <input type="number" min="0"  b  placeholder="" value="" name="montant">
            </p>
          </div>
         
          <button class="w-100 btn btn-success btn-lg" type="submit">Modifier</button>
          <hr class="my-4">
      </form>
          </div>
 