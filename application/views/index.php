
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Gestion</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    
    <link href="<?php echo site_url("assets/css/bootstrap.min.css")?>" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo site_url('assets/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/dist/css/style_ListeOffre.css"); ?>" rel="stylesheet" meadia="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="<?php echo site_url('assets/sidebars.css');?>" rel="stylesheet">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFX2v5z34vYKl0We4nHV4KFV1j6uVsltg&libraries=places&callback=initMap"></script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/formulaire.js"></script>


    <!-- Bootstrap core CSS -->
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

      
<script type="text/javascript">
        function initialize() {
            var mapOptions = {
                center: new google.maps.LatLng(-18.9860306340868, 47.53277682049036),
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.RELIEF
            };
            // creation de la carte
            var carte = new google.maps.Map(document.getElementById("carteId"),
                mapOptions);

            var tabMarqueurDepart = new Array();
            var tabMarqueurArrive = new Array();
            distanceMatrixService = new google.maps.DistanceMatrixService();

            // recuperation des coordonnées
            document.getElementById("lieuRecuperation").value = "-18.9860306340868, 47.53277682049036";
            coordRecuperation[0] = new google.maps.LatLng(-18.9860306340868, 47.53277682049036);
            genererHeureDistance();

            //recuperation des coordonnées de recuperation et de livraison
            google.maps.event.addListener(carte, 'click', function(event) {
                if (coordSelectionne.localeCompare("") == 0) {
                    alert("Veuillez appuyer sur le bouton Lieu pour marquer votre emplacement sur la carte s'il vous plaît.");
                } else {
                    if (coordSelectionne.localeCompare("lieuRecuperation") == 0) {
                        while (tabMarqueurDepart[0]) {
                            tabMarqueurDepart.pop().setMap(null);
                        }
                        tabMarqueurDepart.push(new google.maps.Marker({
                            position: event.latLng, //coordonnée de la position du clic sur la carte
                            map: carte, //la carte sur laquelle le marqueur doit être affiché
                            label: {
                                text: "Depart",
                                color: "black",
                                fontSize: "19px"
                            },
                            icon: {
                                url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                            }
                        }));

                    } else {
                        // placement marqueur
                        while (tabMarqueurArrive[0]) {
                            tabMarqueurArrive.pop().setMap(null);
                        }
                        tabMarqueurArrive.push(new google.maps.Marker({
                            position: event.latLng, //coordonnée de la position du clic sur la carte
                            map: carte, //la carte sur laquelle le marqueur doit être affiché
                            label: {
                                text: "Votre Adresse",
                                color: "black",
                                fontSize: "19px"
                            },
                            icon: {
                                url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"
                            }
                        }));
                        // recuperation des coordonnées
                        document.getElementById("lieuLivraison").value = event.latLng.lat() + "," + event.latLng.lng();
                        coordLivraison[0] = event.latLng;
                        genererHeureDistance();
                    }
                }
            });
            // champ de recherche avec auto-completition
            var trajectoireDiv = document.getElementById("trajectoire");
            carte.controls[google.maps.ControlPosition.LEFT_CENTER].push(trajectoireDiv);

            markers = new Array();
            popup = new google.maps.InfoWindow();
            var searchDiv = document.getElementById("searchDiv");
            carte.controls[google.maps.ControlPosition.TOP_CENTER].push(searchDiv);
            var searchField = document.getElementById("autocomplete_searchField");
            var searchOptions = {
                bounds: new google.maps.LatLngBounds(new google.maps.LatLng(8.54, 17.33), new google.maps.LatLng(39.67, 43.77)),
                types: new Array()
            };
            var autocompleteSearch = new google.maps.places.Autocomplete(searchField, searchOptions);
            google.maps.event.addListener(autocompleteSearch, 'place_changed', function() {
                while (markers[0]) {
                    markers.pop().setMap(null);
                }
                var place = autocompleteSearch.getPlace();
                if (place.geometry) {
                    pinpointResult(place);
                }

                function pinpointResult(result) {
                    var placeIcon = {
                        url: result.icon,
                        scaledSize: new google.maps.Size(30, 30)
                    };

                    var marker = new google.maps.Marker({
                        map: carte,
                        position: result.geometry.location,
                        icon: placeIcon
                    });

                    carte.setCenter(result.geometry.location);
                    carte.setZoom(16);
                    google.maps.event.addListener(marker, 'click',
                        function() {
                            var popupContent = '<b>Name: </b> ' + result.name +
                                '<br/>' + '<b>Vicinity: </b>' + result.vicinity;

                            popup.setContent(popupContent);
                            popup.open(carte, this);
                        });
                    markers.push(marker);
                }
            });
        }
        // creation de la carte au chargement de la page
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Mon entreprise</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="<?php echo site_url('IndexCtrl/'); ?>">Liste des offres</a>
    <a class="p-2 text-dark" href="<?php echo site_url('formulaireInsertionCV/'); ?>">Envoyer un CV</a>
  </nav>
  <a class="btn btn-outline-primary" href="<?php echo site_url('LoginCtrl/'); ?>">Se connecter</a>
</div>


<div class="container">
    <?php include $view.'.php' ; ?>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <small class="d-block mb-3 text-muted">© 2021-2022</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Cool stuff</a></li>
          <li><a class="text-muted" href="#">Random feature</a></li>
          <li><a class="text-muted" href="#">Team feature</a></li>
          <li><a class="text-muted" href="#">Stuff for developers</a></li>
          <li><a class="text-muted" href="#">Another one</a></li>
          <li><a class="text-muted" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Resource</a></li>
          <li><a class="text-muted" href="#">Resource name</a></li>
          <li><a class="text-muted" href="#">Another resource</a></li>
          <li><a class="text-muted" href="#">Final resource</a></li>
        </ul>
      </div>
    </div>
  </footer>
</div>
<script src="<?php echo site_url('/assets/dist/js/bootstrap.bundle.min.js');?>"></script>

<script src="<?php echo site_url('assets/sidebars.js');?>"></script>

</body></html>