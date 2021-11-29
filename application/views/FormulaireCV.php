<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    </link>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/formulaire.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFX2v5z34vYKl0We4nHV4KFV1j6uVsltg&libraries=places&callback=initMap"></script>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

    <title>Gestion</title>

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
                    alert("Veuillez specifier si ce sont les coordonnées de depart ou d'arrivée");
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
    <div class="row no-gutters slider-text justify-content-start align-items-center">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div class="text">
                <div id="searchDiv">
                    <input class="form-control" type="text" name="recherche" id="autocomplete_searchField" size="30px" placeholder="Recherche" style="margin-top:10px;margin-left:60px">
                </div>
                <br>
                <div class="row justify-content-center">
                    <div id="carteId" class="bg-white" style="min-height: 150vh; min-width: 90vh;"></div>
                </div>
                <div id="trajectoire">
                    <input class="btn btn-success" type="button" name="destination" value="Lieu" onclick="switchCoord('Votre Adresse')" style="margin-left:10px;margin-top:-950px"></input>
                </div>
                <br>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">

            <form method="GET" action="<?php echo base_url();?>Formulaire/traiteCV" class="request-form ftco-animate">

                <center>
                    <h2>Curiculum Vitae</h2>
                </center>

                <div class="form-group">
                    <label for="">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required></input>
                </div>
                <div class="form-group">
                    <label for="">Prenoms</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required></input>
                </div>
                <div class="form-group">
                    <label for="">Date de naissance</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="mm/dd/yyyy"></input>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input class="form-control" type="text" id="lieuRecuperation" name="lieuRecuperation" placeholder="Depart" hidden></input>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" type="text" id="lieuLivraison" name="lieuLivraison" placeholder="Destination" hidden></input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Adresse</label>
                    </div>
                    <div class="col-md-6">
                        <label for="">(cliquer sur "lieu" pour remplir)</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" required></input>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" type="text" id="distance" name="distance" placeholder="Distance" readonly></input>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="">Sexe</label>
                    <br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="masculin" name="sexe" value="Masculin" class="custom-control-input" required>
                        <label class="custom-control-label" for="masculin">Masculin</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="feminin" name="sexe" value="Feminin" class="custom-control-input" required>
                        <label class="custom-control-label" for="feminin">Feminin</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="autre" name="sexe" value="Autre" class="custom-control-input" required>
                        <label class="custom-control-label" for="autre">Autre</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Description du profil</label>
                    <textarea class="form-control" class="must" rows="3" cols="30" type="text" id="description" name="description" placeholder="Description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="">Situation matrimonial</label>
                    <br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="divorcee" name="matrimonial" value="Divorcee" class="custom-control-input" required>
                        <label class="custom-control-label" for="divorcee">Divorce(e)</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="marriee" name="matrimonial" value="Marriee" class="custom-control-input" required>
                        <label class="custom-control-label" for="marriee">Marrie(e)</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="celibataire" name="matrimonial" value="Celibataire" class="custom-control-input" required>
                        <label class="custom-control-label" for="celibataire">Celibataire</label>
                    </div>
                </div>
                <label for="">Diplôme</label>
                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control" id="grade" name="grade" required>
                            <option value="<?php echo $listeGrade[0]->getIdGrade() ?>"><?php echo $listeGrade[0]->getTitre() ?></option>
                            <option value="<?php echo $listeGrade[1]->getIdGrade() ?>"><?php echo $listeGrade[1]->getTitre() ?></option>
                            <option value="<?php echo $listeGrade[2]->getIdGrade() ?>"><?php echo $listeGrade[2]->getTitre() ?></option>
                            <option value="<?php echo $listeGrade[3]->getIdGrade() ?>"><?php echo $listeGrade[3]->getTitre() ?></option>
                            <option value="<?php echo $listeGrade[4]->getIdGrade() ?>"><?php echo $listeGrade[4]->getTitre() ?></option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" id="diplomeTitre" name="diplomeTitre" placeholder="Titre" required></input>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="text" id="diplomeEtablissement" name="diplomeEtablissement" placeholder="Etablissement" required></input>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="date" id="diplomeObtention" name="diplomeObtention" placeholder="Obtention"></input>
                    </div>
                </div>
                <br>
                <label for="">Experience</label>
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="text" id="posteExp" name="posteExp" placeholder="Poste" required></input>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" id="societeExp" name="societeExp" placeholder="Société" required></input>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="date" id="dateEntre" name="dateEntre"></input>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="date" id="dateSorti" name="dateSorti"></input>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Langue</label>
                        <select class="form-control" id="langue" name="langue" required>
                            <option value="<?php echo $listeLangue[0]->getTitre() ?>"><?php echo $listeLangue[0]->getTitre() ?></option>
                            <option value="<?php echo $listeLangue[1]->getTitre() ?>"><?php echo $listeLangue[1]->getTitre() ?></option>
                            <option value="<?php echo $listeLangue[2]->getTitre() ?>"><?php echo $listeLangue[2]->getTitre() ?></option>
                            <option value="<?php echo $listeLangue[3]->getTitre() ?>"><?php echo $listeLangue[3]->getTitre() ?></option>
                            <option value="<?php echo $listeLangue[4]->getTitre() ?>"><?php echo $listeLangue[4]->getTitre() ?></option>
                            <option value="<?php echo $listeLangue[5]->getTitre() ?>"><?php echo $listeLangue[5]->getTitre() ?></option>
                            <option value="<?php echo $listeLangue[6]->getTitre() ?>"><?php echo $listeLangue[6]->getTitre() ?></option>
                            <option value="<?php echo $listeLangue[7]->getTitre() ?>"><?php echo $listeLangue[7]->getTitre() ?></option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Niveau</label><br>
                        <center><input type="range" class="custom-range" min="0" max="10" step="0.5" id="niveau" name="niveau" style="width:160px;margin-top:10px"></input></center>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Competence</label>
                        <input class="form-control" type="text" id="titreCompetence" name="titreCompetence" placeholder="Titre" required></input>
                    </div>
                    <div class="col-md-6">
                        <label for="">Niveau</label><br>
                        <center><input type="range" class="custom-range" min="0" max="10" step="0.5" id="niveauTitre" name="niveauTitre" style="width:160px;margin-top:10px"></input></center>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="">Loisir</label>
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-control" id="categorie" name="categorie">
                                <option value="<?php echo ($nomCategorie[0]->getCategorie()); ?>"><?php echo ($nomCategorie[0]->getCategorie()); ?></option>
                                <option value="<?php echo ($nomCategorie[1]->getCategorie()); ?>"><?php echo ($nomCategorie[1]->getCategorie()); ?></option>
                                <option value="<?php echo ($nomCategorie[2]->getCategorie()); ?>"><?php echo ($nomCategorie[2]->getCategorie()); ?></option>
                                <option value="<?php echo ($nomCategorie[3]->getCategorie()); ?>"><?php echo ($nomCategorie[3]->getCategorie()); ?></option>
                                <option value="<?php echo ($nomCategorie[4]->getCategorie()); ?>"><?php echo ($nomCategorie[4]->getCategorie()); ?></option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" id="loisir" name="loisir" placeholder="Loisir" required></input>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Poste</label>
                    <select class="form-control" id="poste" name="poste">
                        <option value="<?php echo ($nomPoste[0]->getNom()); ?>"><?php echo ($nomPoste[0]->getNom()); ?></option>
                        <option value="<?php echo ($nomPoste[1]->getNom()); ?>"><?php echo ($nomPoste[1]->getNom()); ?></option>
                        <option value="<?php echo ($nomPoste[2]->getNom()); ?>"><?php echo ($nomPoste[2]->getNom()); ?></option>
                        <option value="<?php echo ($nomPoste[3]->getNom()); ?>"><?php echo ($nomPoste[3]->getNom()); ?></option>
                        <option value="<?php echo ($nomPoste[4]->getNom()); ?>"><?php echo ($nomPoste[4]->getNom()); ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="@gmail.com" required></input>
                </div>
                <div class="form-group">
                    <label for="">Contact</label>
                    <input class="form-control" type="text" id="contact" name="contact" placeholder="(Facultatif)"></input>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <center><button type="submit" class="btn btn-success" style="border-radius: 8px;">Valider</button></center>
                </div>
            </form>
        </div>

        <div class="col-md-1"></div>
</body>

</html>
