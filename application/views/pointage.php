
  <div class="container">
      <div class="py-3 text-center">
        <img class="d-block mx-auto mb-4" src="<?php echo site_url('assets/photos/icon.png'); ?>" alt="" width="72" height="57">
        <h2>Pointage des employés</h2>
        <p class="lead">Formulaire de Pointage</p>
      </div>
      <?php if(isset($erreur)!=null){ ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $erreur ;?>
        </div>
      <?php } ?>
        <form action="<?php echo site_url('Pointage/ajouterPointage'); ?>" method="post"> 
        <div class="row g-3">  
          <div class="col-md-7 col-lg-8">
                <p class="mb-4"><b>Votre Pointage : </b>
                    <select class="from-control" name="choix" >
                        <option value="1" >Entrer</option>
                        <option value="2" >Sortie</option>
                    </select>
                </p>
            </div>        
            <div class="col-md-7 col-lg-8">
                <p class="mb-4"><b>Matricule : </b> <input type="number" min="0" style="width:100px;" class="from-control"  value="" name="idEmploye"></p>
            </div>
            
                <button class="w-100 btn btn-success btn-lg" type="submit">Valider</button>
      </div>
        </form>
      </div>
  </div>
