    <div>
        <form id="filtreforme">
        <div class="row">
            <div class="col">
                <input id="matricule" placeholder="Matricule" class="form-control" name="matricule">
            </div>
            <div class="col">
                <input id="nom" name="nom" type="text" class="form-control" placeholder="Nom">
            </div>
            <div class="col">
                <input id="prenom" name="prenom" type="text" class="form-control" placeholder="prenom">
            </div>
            <div class="col">
                <select class="form-select" aria-label="Default select example" id="departement" name="departement">
                    <option value="0">Département</option>
                    <?php for ($i=0; $i<count($liste_dept); $i++) {?>
                        <option value="<?php echo $liste_dept[$i]['idDepartement']; ?>" ><?php echo $liste_dept[$i]['nom']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col">
                <select class="form-select" aria-label="Default select example" id="poste" name="poste">
                    <option value="0">poste</option>
                </select>
            </div>
            <div class="col">
                <button type="submit"  class="btn btn-primary mb-3" >Rechercher</button
            </div>
            
        </div>
        </form>
    </div>
    <div>
        <div id="result_bloc" >
        <table id="tableau_liste" class="table table-striped" style="text-align:center;">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Département</th>
                    <th>Poste</th>
                </tr>
                </thead>
                <tbody>
                <!-- bloc resultat -->
                <?php  for ($i=0; $i<count($liste_emp); $i++) {?>
                <tr style="text-align : center;" >
                <?php if ($this->session->userdata('inRH')==true){  ?>
                    <td><a href="<?php echo site_url("EmployeController/fiche?idEmploye=".$liste_emp[$i]['idEmploye']); ?>" ><?php echo $liste_emp[$i]['idEmploye']; ?></a></td>
                <?php }else{ ?>
                    <td><?php echo $liste_emp[$i]['idEmploye']; ?></td>
                <?php } ?>
                    <td><?php echo $liste_emp[$i]['nom']; ?></td>
                    <td><?php echo $liste_emp[$i]['prenom']; ?></td>
                    <td><?php echo $liste_emp[$i]['nomDepartement']; ?></td>
                    <td><?php echo $liste_emp[$i]['nomPoste']; ?></td>
                </tr>
                <?php }?>
                <!-- fin bloc resultat -->
                </tbody>
        </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        
        function replaceTableContent (liste) {
            $tableau = $('#tableau_liste');
            $tableau.html("<thead><tr><th>Matricule</th><th>Nom</th><th>Prénom</th><th>Département</th><th>Poste</th></tr></thead><tbody>");
            for (var i = 0; i<liste.length; i++) {
                $tableau.html($tableau.html() + "<tr style='text-align : center;' ><?php if ($this->session->userdata('inRH')==true){  ?><td><a href='<?php echo site_url("EmployeController/fiche?idEmploye="); ?>"+liste[i]['idEmploye']+"'>"+liste[i]['idEmploye']+"</a></td><?php }else{ ?><td>"+liste[i]['idEmploye']+"</td><?php } ?>"+"<td>"+liste[i]['nom'] +"</td>"+"<td>"+liste[i]['prenom'] +"</td>"+"<td>"+liste[i]['nomDepartement'] +"</td>"+"<td>"+liste[i]['nomPoste'] +"</td>"+"</tr>")
            }
            $tableau.html($tableau.html() + "</tbody>");
        }
            
        $(document).ready(function () {
            
            
            $('#filtreforme').on('submit', function(event) {
                event.preventDefault();
                var  values = $(this).serialize();
                
                $.ajax({
                    url: "<?php echo site_url('EmployeController/filtrer'); ?>",
                    type: "post",
                    data:  values,
                    success: function (response) {
                        liste = JSON.parse(response);
                        replaceTableContent(liste);
                    }
                });

            });

            $('#departement').on('change', function() {
                $val= $(this).val();
                console.log($val);
                $.ajax({
                    url: "<?php echo site_url('EmployeController/changerDept'); ?>",
                    type: "post",
                    data: "departement="+$val,
                    success: function (response) {
                        liste_postes = JSON.parse(response);
                         $p = $('#poste');
                         $p.html("<option value='0'>poste</option>");
                         for(var i=0; i<liste_postes.length ; i++){
                            $p.html($p.html() + "<option value='"+ liste_postes[i]['idPoste'] +"' >"+liste_postes[i]['nom']+"</option>");
                         }
                        

                    }
                })
            });
        });
    </script>
