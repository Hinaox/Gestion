<div>
    <?php for($i=0; $i<3; $i++){ ?>   
        </br>
    <?php } ?>
</div>

<h3><?php echo $reponse; ?></h3>
<form action="DemandeCongeCtrl/accepter" method="post">
    <input type="hidden" name="idDemande" value="<?php echo $idDemande ; ?>" />
    <input type="hidden" name="confirmation" value="1" />
    <td><button class="w-100 btn btn-success btn-lg" type="submit" >Continuer</button></td>
</form>
<form action="DemandeCongeCtrl/refuser" method="post">
    <input type="hidden" name="idDemande" value="<?php echo $idDemande ; ?>" />
    <td><button class="w-100 btn btn-danger btn-lg" type="submit">Refuser</button></td>
</form>