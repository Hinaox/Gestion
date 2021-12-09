<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <title>Modification IRSA</title>

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
        <h2>Modification IRSA</h2>
        <p class="lead">Formulaire de Modification Par Tranche</p>
        <?php if(isset($succes)){ ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $succes;?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
      </div>

      <form action="<?php echo site_url('IrsaController/updateIrsa'); ?>" method="post">
        <div class="row g-3">
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">1ère Tranche</h4>

            <div class="row g-3">
              <div class="col-sm-6">
                <label for="max" class="form-label">Max</label>
                <input type="number" class="form-control" id="max" placeholder="<?php echo $irsa[0]['montantMax']; ?>" value="" name="max1">
              </div>
              <div class="col-sm-6">
                <label for="taux" class="form-label">Taux</label>
                <input type="number" class="form-control" id="taux" placeholder="<?php echo $irsa[0]['taux']; ?>" value="" name="taux1">
              </div>
            </div>
          </div>

          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">2ème Tranche</h4>
            <div class="row g-3">
              <div class="col-sm-3">
                <label for="min" class="form-label">Min</label>
                <input type="number" class="form-control" id="min" placeholder="<?php echo $irsa[1]['montantMin']; ?>" value="" name="min2">

              </div>
              <div class="col-sm-3">
                <label for="max" class="form-label">Max</label>
                <input type="number" class="form-control" id="max" placeholder="<?php echo $irsa[1]['montantMax']; ?>" value="" name="max2">

              </div>
              <div class="col-sm-3">
                <label for="taux" class="form-label">Taux</label>
                <input type="number" class="form-control" id="taux" placeholder="<?php echo $irsa[1]['taux']; ?>" value="" name="taux2">

              </div>
            </div>
          </div>
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">3ème Tranche</h4>
            <div class="row g-3">
              <div class="col-sm-3">
                <label for="min" class="form-label">Min</label>
                <input type="number" class="form-control" id="min" placeholder="<?php echo $irsa[2]['montantMin']; ?>" value="" name="min3">

              </div>
              <div class="col-sm-3">
                <label for="max" class="form-label">Max</label>
                <input type="number" class="form-control" id="max" placeholder="<?php echo $irsa[2]['montantMax']; ?>" value="" name="max3">

              </div>
              <div class="col-sm-3">
                <label for="taux" class="form-label">Taux</label>
                <input type="number" class="form-control" id="taux" placeholder="<?php echo $irsa[2]['taux']; ?>" value="" name="taux3">

              </div>
            </div>
          </div>
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">4ème Tranche</h4>
            <div class="row g-3">
              <div class="col-sm-3">
                <label for="min" class="form-label">Min</label>
                <input type="number" class="form-control" id="min" placeholder="<?php echo $irsa[3]['montantMin']; ?>" value="" name="min4">

              </div>
              <div class="col-sm-3">
                <label for="max" class="form-label">Max</label>
                <input type="number" class="form-control" id="max" placeholder="<?php echo $irsa[3]['montantMax']; ?>" value="" name="max4">

              </div>
              <div class="col-sm-3">
                <label for="taux" class="form-label">Taux</label>
                <input type="number" class="form-control" id="taux" placeholder="<?php echo $irsa[3]['taux']; ?>" value="" name="taux4">

              </div>
            </div>
          </div>
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">5ème Tranche</h4>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="min" class="form-label">Min</label>
                <input type="number" class="form-control" id="min" placeholder="<?php echo $irsa[4]['montantMin']; ?>" value="" name="min5">

              </div>
              <div class="col-sm-6">
                <label for="taux" class="form-label">Taux</label>
                <input type="number" class="form-control" id="taux" placeholder="<?php echo $irsa[4]['taux']; ?>" value="" name="taux5">

              </div>
            </div>
          </div>
          <button class="w-100 btn btn-success btn-lg" type="submit">Modifier</button>
          <hr class="my-4">

        </div>


      </form>


  </div>
  </div>
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