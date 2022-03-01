
        <section>
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <center><h1>Login</h1></center>
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="<?php echo base_url('assets/photos/draw2.png'); ?>" class="img-fluid"
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
        </section>
