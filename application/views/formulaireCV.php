
    <div class="row no-gutters slider-text justify-content-start align-items-center">
        <div class="col-md-2"></div>
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
                    <input class="btn btn-success" type="button" name="destination" value="Lieu" onclick="switchCoord('Votre Adresse')" style="margin-left:10px;margin-top:-850px;"></input>
                </div>
                <br>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
        <a href="<?php echo site_url('FiltreCVController/tousCV'); ?>">Voir tous les CV</a>

            <form method="GET" action="<?php echo base_url(); ?>FormulaireInsertionCV/traiteCV" class="request-form ftco-animate">

                <center>
                    <h2>Curiculum Vitae</h2>
                </center>
                <?php if(!empty($succes)){ ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $succes; ?>
                </div>
                <?php } ?>

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
                    <div class="col-md-8">
                        <label for="">Adresse</label>
                    </div>
                    <div class="col-md-4">
                        <label for=""></label>
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
                            <?php for ($i = 0; $i < count($titre); $i++) { ?>
                                <option value="<?php echo $idGrade[$i] ?>"><?php echo $titre[$i] ?></option>
                            <?php } ?>
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
                <div>
                    <label for="">Domaine</label>
                    <select class="form-control" id="domaine" name="domaine">
                        <?php for ($i = 0; $i < count($Titre); $i++) { ?>
                            <option value="<?php echo $IdDomaine[$i] ?>"><?php echo $Titre[$i] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <div>
                    <label for="">Scolarité</label>
                    <input class="form-control" type="text" name="etablissementScolarite" name="etablissementScolarite" placeholder="Etablissement" />
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Date Entrée</label>
                        </div>
                        <div class="col-md-6">
                            <label for="">Date Sortie</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="date" name="dateEntreScolarite" id="dateEntreScolarite" />
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="date" name="dateSortieScolarite" id="dateSortieScolarite" />
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Langue</label>
                        <select class="form-control" id="langue" name="langue" required>
                            <?php for ($i = 0; $i < count($titreLangue); $i++) { ?>
                                <option value="<?php echo $idLangue[$i]; ?>"><?php echo $titreLangue[$i]; ?></option>
                            <?php } ?>
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
                                <?php for ($i = 0; $i < count($categorieLoisire); $i++) { ?>
                                    <option value="<?php echo ($idCategorieLoisire[$i]); ?>"><?php echo ($categorieLoisire[$i]); ?></option>
                                <?php } ?>
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
                        <?php for ($i = 0; $i < count($nomPoste); $i++) { ?>
                            <option value="<?php echo ($idPoste[$i]); ?>"><?php echo ($nomPoste[$i]); ?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="@gmail.com" required></input>
                </div>
                <div class="form-group">
                    <label for="">Contact</label>
                    <input class="form-control" type="text" id="contact" name="contact" placeholder="Numéro de téléphone"></input>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <center><button type="submit" class="btn btn-success" style="border-radius: 8px;">Valider</button></center>
                </div>
            </form>
            <?php if(!empty($succes)){ ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $succes; ?>
                </div>
            <?php } ?>
        </div>

