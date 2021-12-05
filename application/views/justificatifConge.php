
    
  <div class="container">>
      <div class="py-5 text-center">
        <h2>Justificatif de congé</h2>
        <h3>non deductible sur congé</h3>
      </div>

      <form action="<?php echo site_url('DemandeCongeCtrl/accepterNonDeductible'); ?>" method="post">
        <div class="row g-3">
          <div class="col-md-7 col-lg-8">
          <p class="lead">L'employé(e) avec le matricule</p>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="id" class="form-label">ID</label>
                <input type="number" min="0" class="form-control" id="id" name="idEmploye">
              </div>
            </div>
            * souhaite justifier son congé</br>
            Du <input type="date" class="form-control" id="dateDebut" name="dateDebut"> 
            au <input type="date" class="form-control" id="dateFin" name="dateFin">
          </div>

          <?php if(isset($erreur)){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $erreur;?></strong>
                </div>
            <?php } ?>

          <div class="col-md-7 col-lg-8">
            <div class="row g-3">
                <div class="col-sm-3">
                    <label for="motif">Motif</label>
                    <select class="custom-select d-block w-100" id="motif" name="idMotif" required="">
                        <?php for($i=0; $i<count($motif); $i++){ ?>
                            <option value="<?php echo $motif[$i]['id']; ?>"><?php echo $motif[$i]['description']; ?></option>
                        <?php } ?>
                    </select>
              </div>
            </div>
          </div>
            <?php if(isset($send)){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo $send;?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
          <button class="w-100 btn btn-success btn-lg" type="submit">Demander</button>
          <hr class="my-4">

        </div>
      </form>

            </div>
