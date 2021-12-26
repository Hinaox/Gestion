
    <div class="container-fluid">
        
    <?php if ($this->session->userdata('employe')!=null) { ?>
        <div class="row">
        
            <div class="col-md-4">
                <div class="Jumbotron" style="margin-top:5%">
                <h4>Departement:<span class="Nomdepartement" style="color:#0d6efd">Ressources humaines</span></h4>
                </div>
            </div>
            <div class="col-md-8">
                <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="#" class="nav-link " aria-current="page">Ajouter Offre</a></li>
                        <li class="nav-item"><a href="#" class="nav-link active">Listes des Offres</a></li>
                    </ul>
                </header>
            </div>

        </div>
    <?php } ?>

        <div class="row">
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                            <svg class="bi me-2" width="40" height="32">
                                <use xlink:href="#bootstrap" />
                            </svg>
                            <span class="fs-4">Trier les Offres:</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Diplomes</label>
                                    <select class="form-select" id="inputGroupSelect01">
                                        <?php //foreach ($diplomes as $diplome) { ?>
                                            <option value="<?php // echo $diplome['idDiplomeOffre'] ?>"><?php  //echo $diplome['titre'] ?></option>

                                        <?php // } ?>
                                    </select>
                                </div>
                            </li>

                            <li style="margin-top:10px">

                                Age requis: <input class="form-control form-control" type="text" placeholder="" aria-label=".form-control-lg example">
                            </li>

                        </ul>
                        <hr>

                    </div>
                </form>
            </div>
            <div class="col-md-8 col-sm-6">
                <h2 class="text-center text-uppercase">Listes des offres d'emploi </h2>
                <?php foreach ($listeOffres as $listeOffre) { ?>
                    <div class="job-card">
                        <div class="job-card__content">
                            <div class="job-card_img">
                                <img src="<?php echo base_url("assets/dist/img/google.png"); ?>" alt="Company Logo">
                            </div>
                            <div class="job-card_info">
                                <h6 class="text-muted">
                                    <a href="#!" class="job-card_company">Company Name</a>
                                </h6>
                                <h5><?php echo $listeOffre['Poste'] ?></h5>
                                <p class="mb-2"><?php echo $listeOffre['description'] ?></p>
                            </div>
                        </div>
                        <div class="job-card__footer">
                            <div class="job-card_job-type">
                                <span class="job-label">+<?php echo $listeOffre['ageMin'] ?>ans</span>
                                <span class="job-label"><?php echo $listeOffre['titre'] ?></span>
                                <span class="job-label">Date Limite : <?php echo $listeOffre['dateLimite'] ?></span>
                            </div>
                            <button class="btn btn-primary">Details</button>
                        </div>
                    </div>
                <?php } ?>




            </div>
        </div>
    </div>