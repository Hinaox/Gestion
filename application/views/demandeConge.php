
    <main>
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h2>Demande de congé</h2>
        <?php if(isset($succes)){ ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $succes;?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
      </div>

      <form action="<?php echo site_url('DemandeCongeCtrl/envoiDemande'); ?>" method="post">
        <div class="row g-3">
          <div class="col-md-7 col-lg-8">
          <p class="lead">L'employé(e) avec le matricule</p>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="id" class="form-label">ID</label>
                <input type="number" min="0" class="form-control" id="id" name="idEmploye">
              </div>
            </div>
            * souhaite faire une demande de congé</br>
            Du <input type="date" class="form-control" id="dateDebut" name="dateDebut"> 
            au <input type="date" class="form-control" id="dateFin" name="dateFin">
          </div>

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
          <a href = "#"> Voir son état de congé </a>
          <hr class="my-4">

        </div>
      </form>

  </main>
