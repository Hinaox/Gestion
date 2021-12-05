<?php
if (empty($view)){
        $view = 'listeDemande';
    }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <title>Demande de conge</title>
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
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Gestion RH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('demandeCongeCtrl/'); ?>">Liste des demandes <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('demandeCongeCtrl/demanderDeductible'); ?>">Demande deductible</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('demandeCongeCtrl/demanderNonDeductible'); ?>">Demande non deductible</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('EtatCongeCtrl/'); ?>">Etats de congé</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
  <?php include $view.'.php' ; ?>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2021 </p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>


  <script src="<?php echo site_url('assets/dist/js/bootstrap.bundle.min.js'); ?>"></script>

  <script src="<?php echo site_url('assets/form-validation.js'); ?>"></script>
  
</body>

</html>