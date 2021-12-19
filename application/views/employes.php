
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form id="form_filtre">
  <label>Recherche : </label>
  <input name="nom_prenom" type="text" id="recherche_tf">
  <label>Département : </label>
  <select name="departement">
    <option value="0">Tous</option>
    <?php for ($i = 0; $i < count($departements); $i++) { ?>
      <option value="<?php echo $departements[$i]['idDepartement'] ?>"><?php echo $departements[$i]['nom']; ?></option>
    <?php } ?>
  </select>
  <!-- <input type="submit" value="Filtre" > -->
  <button id="filtre_bt">Filtre</button>
</form>

<table id="tableau_liste" border="1">
  <tr>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Poste</th>
    <th>Département</th>
  </tr>
  <?php for ($i = 0; $i < count($employes); $i++) { ?>
    <tr onclick="versFiche(<?php echo $employes[$i]['idEmploye']; ?>)">
      <td><?php echo $employes[$i]['nom']; ?></td>
      <td><?php echo $employes[$i]['prenom']; ?></td>
      <td><?php echo $employes[$i]['nomPoste']; ?></td>
      <td><?php echo $employes[$i]['nomDepartement']; ?></td>
    </tr>
  <?php } ?>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let siteUrl = "<?php echo site_url(); ?>";
    function versFiche(idEmploye) {
        // console.log("Vers fiche "+idEmploye);
        document.location= siteUrl + "EmployeCtrl/fiche?idEmploye=" +idEmploye; 
    }
</script>
<script>
  $form = $("#form_filtre");
  $form.on("submit", function(ev) {
    ev.preventDefault();
  });

  $filtre_bt = $("#filtre_bt");

  $filtre_bt.on('click', function() {

  });
</script>
<script>
  $('#filtre_bt').on('click', function() {
    $.ajax({
      url: siteUrl + "EmployeCtrl/filtre",
      type: "get",
      data: $('#form_filtre').serialize(),
      success: function(reponse) {
          liste = JSON.parse(reponse);

          replaceTableContent(liste);
      },
    });
  });


  function replaceTableContent (liste) {
      $tableau = $('#tableau_liste');
      $tableau.html("<tr><th>Nom</th><th>Prénom</th><th>Poste</th><th>Département</th></tr>");
      for (var i = 0; i<liste.length; i++) {
        $tableau.html($tableau.html() + "<tr onclick='versFiche("+ liste[i]['idEmploye'] +")' >"+"<td>"+liste[i]['nom'] +"</td>"+"<td>"+liste[i]['prenom'] +"</td>"+"<td>"+liste[i]['nomPoste'] +"</td>"+"<td>"+liste[i]['nomDepartement'] +"</td>"+"</tr>")
      }
  }
</script>
</body>
</html>