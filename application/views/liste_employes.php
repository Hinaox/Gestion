
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div>
        <form id="filtreforme">
            <label for="matricule">Matricule :</label>
            <input id="matricule" name="matricule">
            <label for="nom">Nom :</label>
            <input id="nom" name="nom">
            <label for="prenom">Prénom :</label>
            <input id="prenom" name="prenom">
            <select id="departement" name="departement">
                <option value="0">Département</option>
                <?php for ($i=0; $i<count($liste_dept); $i++) {?>
                    <option value="<?php echo $liste_dept[$i]['idDepartement']; ?>" ><?php echo $liste_dept[$i]['nom']; ?></option>
                <?php } ?>
            </select>
            <select id="poste" name="poste">
                <option value="0">poste</option>
            </select>
            <input type="submit" value="Rechercher" >
        </form>
    </div>
    <div>
        <div id="result_bloc" >
            <table  border="1">
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Département</th>
                    <th>Poste</th>
                </tr>
                <!-- bloc resultat -->
                <?php  for ($i=0; $i<count($liste_emp); $i++) {?>
                <tr style="text-align : center;" onclick="versFiche( <?php $liste_emp[$i]['idEmploye']; ?>)">
                    <td><?php echo $liste_emp[$i]['idEmploye']; ?></td>
                    <td><?php echo $liste_emp[$i]['nom']; ?></td>
                    <td><?php echo $liste_emp[$i]['prenom']; ?></td>
                    <td><?php echo $liste_emp[$i]['nomDepartement']; ?></td>
                    <td><?php echo $liste_emp[$i]['nomPoste']; ?></td>
                </tr>
                <?php }?>
                <!-- fin bloc resultat -->
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let siteUrl = "<?php echo site_url(); ?>";
            function versFiche(idEmploye) {
                // console.log("Vers fiche "+idEmploye);
                document.location= siteUrl + "EmployeCtrl/fiche?idEmploye=" +idEmploye; 
            }
            
        $(document).ready(function () {
            

            $('#filtreforme').on('submit', function(event) {
                event.preventDefault();
                var  values = $(this).serialize();
                // console.log($data);

                // console.log($nom);
                // console.log($prenom);
                // console.log($departement);
                // console.log($poste);
                // console.log($matricule);

                $.ajax({
                    url: "Liste_employes/filtrer",
                    type: "post",
                    data:  values,
                    success: function (response) {
                        $("#result_bloc").html(response);
                    }
                });

            });

            $('#departement').on('change', function() {
                $val= $(this).val();
                console.log($val);
                $.ajax({
                    url: "Liste_employes/changerDept",
                    type: "post",
                    data: "departement="+$val,
                    success: function (response) {
                        $('#poste').html(response);
                    }
                })
            });
        });
    </script>
</body>
</html>

