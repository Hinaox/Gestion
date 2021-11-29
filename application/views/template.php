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
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Gestion RH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('DemandeCongeCtrl/'); ?>">Liste des demandes <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('DemandeCongeCtrl/demanderDeductible'); ?>">Demande deductible</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('DemandeCongeCtrl/demanderNonDeductible'); ?>">Demande non deductible</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('EtatCongeCtrl/'); ?>">Etats de congé</a>
        </li>
      </ul>
      <!-- <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </div>
  </nav>
</header>
  <div class="container">
  <?php include $view.'.php' ; ?>

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
  <script>
        function getXMLHttpRequest() {
            if (window.XMLHttpRequest)
            return new XMLHttpRequest();
            if (window.ActiveXObject) {
            var names = [
            "Msxml2.XMLHTTP.6.0",
            "Msxml2.XMLHTTP.3.0",
            "Msxml2.XMLHTTP",
            "Microsoft.XMLHTTP" ];
            for(var i in names) {
                try {
                    return new ActiveXObject(names[i]);
                } catch(e) {}
                }
            }
            console.log("Votre navigateur ne prend pas en charge l'objet XMLHTTPRequest.");
            return null;
        }
        function accepter(){
            var tableau = document.getElementById('liste');
                var row = document.createElement('tr');
                for (var key in response[0]){
                    var cell = document.createElement('th');
                    var value = document.createTextNode(key);
                    cell.appendChild(value);
                    row.appendChild(cell);
                }
                tableau.appendChild(row);
        }
        function bodyTable( response){
            var tableau = document.getElementById('liste');
            var body = document.createElement('tbody');
            for(var i in response){
                var row = document.createElement('tr');
                for (var key in response[i]){
                    var cell = document.createElement('td');
                    var value = document.createTextNode(response[i][key]);
                    cell.appendChild(value);
                    row.appendChild(cell);
                }
                body.appendChild(row);
            }
            tableau.appendChild(body);
        }
        function ajax() {
            var xhr=getXMLHttpRequest();
            xhr.open("GET", "getPays.php", false);
            xhr.send(null);
            var response = JSON.parse(xhr.responseText);
            headerTable(response);
            bodyTable(response);
        }
        
        function rechercher(){
            var tableau = document.getElementById('liste');

            var xhr=getXMLHttpRequest();
            xhr.open("GET", "getPays.php", false);
            xhr.send(null);
            var response = JSON.parse(xhr.responseText);

            const nom = document.getElementById('nomPays').value;
            var found = null;
            var found = response.find(function(element){
                    if (element['Name'] == nom){
                        return element;
                    }
            });
            console.log(found);

            if (found!=null){
                var body = document.getElementsByTagName('tbody');
                // body.remove();

                var row = document.createElement('tr');
                for (var key in found){
                    var cell = document.createElement('td');
                    var value = document.createTextNode(found[key]);
                    // console.log(value);
                    cell.appendChild(value);
                    row.appendChild(cell);
                }
                headerTable(response);
                tableau.appendChild(row);
            }
            
        }

    </script>
</body>

</html>