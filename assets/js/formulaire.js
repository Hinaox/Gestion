// declaration variable globales
var marker;
var markers;
var coordSelectionne = "";
var coordRecuperation = new Array();
var coordLivraison = new Array();
var distanceMatrixService;

function genererHeureDistance() {
    if (coordRecuperation.length > 0 && coordLivraison.length > 0) {
        distanceMatrixService.getDistanceMatrix({
            origins: coordRecuperation,
            destinations: coordLivraison,
            travelMode: google.maps.TravelMode.DRIVING,
        },
            function (result, status) {
                if (status == google.maps.DistanceMatrixStatus.OK) {
                    var element = result.rows[0].elements[0];
                    // duree du trajet 
                    //document.getElementById("duree").value = element.duration.value;
                    document.getElementById("distance").value = (element.distance.value)/1000;
                }
            }
        );
    }
}

function verifierProgression() {
    let listeInput = document.getElementsByClassName("must");
    let progression = 0;
    for (let i = 0; i < listeInput.length; i++) {
        if (listeInput[i].value != null && listeInput[i].value.localeCompare("") != 0) {
            progression += 100.00 / 7.00;
            //console.log(progression);
        }
    }
    let progressionBar = document.getElementById("progression");
    progressionBar.value = progression;
}

function switchCoord(inputName) {
    //alert(inputName);
    coordSelectionne = inputName;
    if (inputName.localeCompare("lieuLivraison") == 0) {
        document.getElementsByName("destination")[0].style.backgroundColor = "#00FF00";
    } else {
        document.getElementsByName("destination")[0].style.backgroundColor = "#00FF00";
    }
}