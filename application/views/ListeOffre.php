<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AjoutOffre</title>
    <link href="<?php echo base_url("assets/dist/css/bootstrap.min.css"); ?>" rel="stylesheet" meadia="all">
    <link href="<?php echo base_url("assets/dist/css/bootstrap.css"); ?>" rel="stylesheet" meadia="all">

    <link href="<?php echo base_url("assets/dist/css/style_ListeOffre.css"); ?>" rel="stylesheet" meadia="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

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
     <option selected>Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
</div>
                        </li>
                      
                        <li style="margin-top:10px">
                        
                       Age requis: <input class="form-control form-control" type="text" placeholder="" aria-label=".form-control-lg example">
                        </li>
                       
                    </ul>
                    <hr>
                    
                </div>
            </div>
            <div class="col-md-8 col-sm-6">
                <h2 class="text-center text-uppercase">Listes Offres </h2>
                <div class="job-card">
                    <div class="job-card__content">
                        <div class="job-card_img">
                            <img src="<?php echo base_url("assets/dist/img/google.png"); ?>" alt="Company Logo">
                        </div>
                        <div class="job-card_info">
                            <h6 class="text-muted">
                                <a href="#!" class="job-card_company">Google</a>
                            </h6>
                            <h5>Sr. Userexperience Designer</h5>
                            <p class="mb-2">$75k - $105k</p>
                        </div>
                    </div>
                    <div class="job-card__footer">
                        <div class="job-card_job-type">
                            <span class="job-label">Full time</span>
                            <span class="job-label">Senior</span>
                            <span class="job-label">UX/UI</span>
                        </div>
                        <button class="btn btn-primary">Apply</button>
                    </div>
                </div>
                <div class="job-card">
                    <div class="job-card__content">
                        <div class="job-card_img">
                            <img src="<?php echo base_url("assets/dist/img/google.png"); ?>" alt="Company Logo">
                        </div>
                        <div class="job-card_info">
                            <h6 class="text-muted">
                                <a href="#!" class="job-card_company">Google</a>
                            </h6>
                            <h5>Sr. Userexperience Designer</h5>
                            <p class="mb-2">$75k - $105k</p>
                        </div>
                    </div>
                    <div class="job-card__footer">
                        <div class="job-card_job-type">
                            <span class="job-label">Full time</span>
                            <span class="job-label">Senior</span>
                            <span class="job-label">UX/UI</span>
                        </div>
                        <button class="btn btn-primary">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>