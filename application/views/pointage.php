<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <title>Pointage</title>

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
        <img class="d-block mx-auto mb-4" src="<?php echo site_url('assets/photos/icon.png'); ?>" alt="" width="72" height="57">
        <h2>Modification Salaire</h2>
        <p class="lead">Formulaire de Pointage</p>
      </div>
      <?php if(isset($erreur)!=null){ ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $erreur ;?>
        </div>
      <?php } ?>
        <form action="<?php echo site_url('Pointage/ajouterPointage'); ?>" method="post"> 
            <div class="col-md-7 col-lg-8">
                <p class="mb-4"><b>Votre Pointage : </b>
                    <select class="from-control" name="choix" >
                        <option value="1" >Entrer</option>
                        <option value="2" >Sortie</option>
                    </select>
                </p>
            </div>        
            <div class="col-md-7 col-lg-8">
                <p class="mb-4"><b>Matricule : </b> <input type="number" min="0" style="width:100px;" class="from-control"  value="" name="idEmploye"></p>
            </div>
            
                <button class="w-100 btn btn-success btn-lg" type="submit">Valider</button>
            
        </form>
  </main>
  </div>
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