<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col-6">
            <H2>Demande d'achat</H2>
            <div class="card-body">
                <form action="<?php echo site_url('DemandeAchatController/insererDemande'); ?>" method="get">
                    <div>
                        <label>Departement : </label>
                        <select name="idDepartement" class="custom-select" id="">

                            <?php for ($i = 0; $i < count($departement); $i++) { ?>
                                <option value="<?php echo $departement[$i]['idDepartement']; ?>"><?php echo $departement[$i]['nom']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- <p>materiel à commander<input type="text" name="labelCommande" id=""></p> -->
                    <br>
                    <label>Immobilisation : </label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input is-valid" value="1" id="customControlValidation3" name="immobilisation" checked>
                        <label class="custom-control-label" for="customControlValidation3">Oui</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input is-invalid" value="0" id="customControlValidation4" name="immobilisation">
                        <label class="custom-control-label" for="customControlValidation4">Non</label>
                    </div>

                    <div> </div>
                    <div>
                        <label>à commander : </label>
                        <select name="labelCommande" class="custom-select" id="">

                            <?php for ($i = 0; $i < count($ProduitDemander); $i++) { ?>
                                <option value="<?php echo $ProduitDemander[$i]['id']; ?>"><?php echo $ProduitDemander[$i]['label']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    </br>
                    <div>
                        <label>Nouvelle type de commande : </label>
                    </div>
                    <div class="input-group mb-3">

                        <div>
                            <input type="text" name="new" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="number" name="quantite" class="form-control" placeholder="quantite" aria-label="First name">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="unite" class="form-control" placeholder="unite" aria-label="Last name">
                        </div>
                    </div>
                    <br>
                    <!-- <p>quantité : <input type="number" name="quantite" id=""> unite <input type="text" name="unite" id=""></p> -->
                    <div class="row">
                        <div class="col-md-12">
                            <button class="w-100 btn btn-success" type="submit">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col">

        </div>
    </div>