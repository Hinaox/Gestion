<?php
  $emp=null;
  $emp = $this->session->userdata('employe');
  if (isset($employe)){
    $emp=$employe[0];
  }
  
?>
<div class="container">
    <br>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php if ($emp['sexe']=="F"){ ?>
                      <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="Admin" class="rounded-circle" width="150">
                    <?php } else { ?>
                      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <?php } ?>
                    <div class="mt-3">
                      <h4><?php echo $emp['nom'].' '.$emp['prenom']; ?></h4>
                      <p class="text-secondary mb-1"><?php echo $emp['nomPoste']; ?></p>
                      <p class="text-muted font-size-sm"><?php echo $emp['adresse']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($this->session->userdata('inRH')==true){ ?>
                <div class="card mt-3">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <a href="<?php echo site_url('ModifierSalaire/afficher?idEmploye='.$emp['idEmploye']); ?>">Modifier son salaire</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <a href = "<?php echo site_url('EtatCongeEmploye/index?idEmpl='.$emp['idEmploye']); ?>">Voir son état de congé</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <a href = "<?php echo site_url("BPController/listeBulletinEmploye?idEmploye=".$emp['idEmploye']."&nom=".$emp['nom']) ?>">Voir son bulletin de paie</a>
                    </li>
                    
                  </ul>
                </div>
              <?php }else{ ?>
                <div class="card mt-3">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Notification</h6>
                      <span class="text-secondary">congé</span>
                    </li>
                  </ul>
                </div>
              <?php } ?>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nom et prénom</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $emp['nom'].' '.$emp['prenom']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date de naissance</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $emp['dtn']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $emp['email']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tel</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php if ($emp['autre']!=null){ echo $emp['autre'];} ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Adresse</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $emp['adresse']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Situation matrimonial</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $emp['matrimonial']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date d'embauche</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $emp['dateEmbauche']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Departement</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $emp['nomDepartement']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Poste</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $emp['nomPoste']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Description du poste</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $emp['descriPoste']; ?>
                    </div>
                  </div>
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Modifier</a>
                    </div>
                  </div>
                </div>
              </div>
                <?php if (isset($notif)){ ?>
                  <div class="row gutters-sm">
                    <div class="col-sm-12 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Notifications</i></h6>
                          <?php for($i=0;$i<count($notif);$i++){?>
                            <small><?php echo $notif[$i]['date'];?></small>
                            <div><?php echo $notif[$i]['message'];?></div>
                          <?php } ?>
                          
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <?php } ?>
            </div>
          </div>

    </div>