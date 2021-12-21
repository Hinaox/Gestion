
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login</title>
    <link href="<?php echo site_url('assets/css/all.css');?>" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    

    <!-- Bootstrap core CSS -->
<link href="<?php echo site_url('assets/dist/css/bootstrap.min.css');?>" rel="stylesheet">

    <style>
        .divider:after,
        .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
        }
        .h-custom {
        height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
        }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?php echo site_url('assets/sidebars.css');?>" rel="stylesheet">
  </head>
  <body>
    
    <main>
        <div class="container-fluid">
            <div class="row">
        <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid"
                alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form action="<?php echo site_url('LoginCtrl/traitement'); ?>" method="post">
                <div class="divider d-flex align-items-center my-4">
                    <p class="text-center fw-bold mx-3 mb-0">Se connecter</p>
                </div>
                
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="form3Example3" name="email" class="form-control form-control-lg"
                    placeholder="Entrez votre email" />
                    <label class="form-label" for="form3Example3">Adresse Email </label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <input type="password" id="form3Example4" name="mdp" class="form-control form-control-lg"
                    placeholder="Entrez le mot de passe" />
                    <label class="form-label" for="form3Example4">Mot de passe</label>
                </div>

                <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                        Remember me
                    </label>
                    </div>
                    <a href="#!" class="text-body">Forgot password?</a>
                </div> -->

                <div class="text-center text-lg-start mt-4 pt-2">
                    <input type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Login"/>
                    <!-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                        class="link-danger">Register</a></p> -->
                </div>

            </form>
            <?php if (isset($erreur)){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $erreur;?></strong>
                </div>
            <?php } ?>
            
            </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="footer text-white mb-3 mb-md-0">
            Copyright © 2020. Tout droit reservé.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <!-- <div>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-google"></i>
            </a>
            <a href="#!" class="text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>
            </div> -->
            <!-- Right -->
        </div>
        </section>
    </div>
    </div>
    </main>

    <script src="<?php echo site_url('/assets/dist/js/bootstrap.bundle.min.js');?>"></script>

      <script src="<?php echo site_url('assets/sidebars.js');?>"></script>
  </body>
</html>
