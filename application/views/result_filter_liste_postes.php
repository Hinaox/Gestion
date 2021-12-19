<option value="0">Poste</option>
<?php for ($i=0; $i<count($liste_postes); $i++) {?>
    <option value="<?php echo $liste_postes[$i]['idPoste'] ?>" ><?php echo $liste_postes[$i]['nom']; ?></option>
<?php }?>