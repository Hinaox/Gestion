<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <title>Demande de conge</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



  <!-- Bootstrap core CSS -->
  <link href="<?php echo site_url('assets/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="<?php echo site_url('assets/form-validation.css'); ?>" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container">
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

      <form action="<?php echo site_url('CongeCtrl/envoiDemande'); ?>" method="post">
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
          <hr class="my-4">

        </div>
      </form>

  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2020 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
  </div>


  <script src="<?php echo site_url('assets/dist/js/bootstrap.bundle.min.js'); ?>"></script>

  <script src="<?php echo site_url('assets/form-validation.js'); ?>"></script>
</body>

</html>