<?php var_dump(site_url('DemandeAchatController/insererDemande')) ?>
<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col-6">
    <H2>Demande d'achat</H2>
        <form action="<?php echo site_url('DemandeAchatController/insererDemande'); ?>" method="get">
            <div>
            <label>Departement : </label>
                <select name="idDepartement" class="custom-select" id="">
                
                    <?php for ($i =0;$i<count($departement);$i++) { ?>
                    <option value="<?php echo $departement[$i]['idDepartement']; ?>"><?php echo $departement[$i]['nom']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <!-- <p>materiel à commander<input type="text" name="labelCommande" id=""></p> -->
            
            <div>Immobilisation : </div> 
            <div class="form-check">
                <input class="form-check-input" type="radio" value="1" name="immobilisation" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                oui
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="0" name="immobilisation" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                non
                </label>
            </div>

            <div> </div>
            <div>
            <label>à commander : </label>
                <select name="labelCommande" class="custom-select" id="">
                
                    <?php for ($i =0;$i<count($ProduitDemander);$i++) { ?>
                    <option value="<?php echo $ProduitDemander[$i]['id']; ?>"><?php echo $ProduitDemander[$i]['label']; ?></option>
                    <?php } ?>
                </select>
            </div> 
            </br>
            <div>
                <label>nouvelle type de commande : </label>   
            </div>   
            <div class="input-group mb-3">

                <div>
                    <input type="text" name="new" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
                    </br>
            <div class="row">
                <div class="col">
                    <input type="number" name="quantite" class="form-control" placeholder="quantite" aria-label="First name">
                </div>
                <div class="col">
                    <input type="text" name="unite" class="form-control" placeholder="unite" aria-label="Last name">
                </div>
            </div>
            <!-- <p>quantité : <input type="number" name="quantite" id=""> unite <input type="text" name="unite" id=""></p> -->
            <div>        
                <button class="w-50 btn btn-success" type="submit">envoyer</button>
            </div> 
      </form>
    </div>
    <div class="col">
      
    </div>
  </div>