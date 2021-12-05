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
        <center>
            <div style="margin-top: 100px;">
                <h2>Confirmer-vous la modification</h2>
                <div style="margin-top: 50px">
                    <p><a href="<?php echo base_url();?>ModifierSalaire/modification?montant=<?php echo $montant;?>"><button type="button" class="btn btn-primary">Confirmer</button></a></p>
                    <p><a href="<?php echo base_url();?>ModifierSalaire/annulation" ><button type="button" class="btn btn-warning">Annuler</button></a></p>
                </div>
            </div>
        </center>
    </main>
  </div>
</body>
</html>