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
<tr style="text-align : center;">
    <td><?php echo $liste_emp[$i]['idEmploye']; ?></td>
    <td><?php echo $liste_emp[$i]['nom']; ?></td>
    <td><?php echo $liste_emp[$i]['prenom']; ?></td>
    <td><?php echo $liste_emp[$i]['nomDepartement']; ?></td>
    <td><?php echo $liste_emp[$i]['nomPoste']; ?></td>
</tr>
<?php }?>
<!-- fin bloc resultat -->
</table>