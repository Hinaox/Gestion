<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AjoutOffre</title>
    <link href="<?php echo base_url("assets/dist/css/bootstrap.min.css"); ?>" rel="stylesheet" meadia="all">
    <link href="<?php echo base_url("assets/dist/css/bootstrap.css"); ?>" rel="stylesheet" meadia="all">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="Jumbotron" style="margin-top:5%">
                    <h2>Nom de l'entreprise</h2>
                    <h4>Departement:<span class="Nomdepartement" style="color:#0d6efd">Ressources humaines</span></h4>

                </div>
            </div>
            <div class="col-md-8">
                <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Ajouter Offre</a></li>
                        <li class="nav-item"><a href="#" class="nav-link ">Listes des Offres</a></li>
                    </ul>
                </header>
            </div>

        </div>

    </div>
    <div class="container-fluid ">
        <form action="Offre/insertOffre" method="post">
            <div class="row">
                <div class="col-md-4 offset-5">
                    <h2>Ajout Apel d'offre</h2>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ">
                    <div class="mb-3">
                        <label for="Post" class="form-label ">Poste:</label>
                        <input type="text" class="form-control" id="Post" name="poste" value="<?php echo $postenom[0]['nom'] ;?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 ">

                    <div class="mb-3">
                        <label for="Responsabilite" class="form-label">Responsabilite:</label>
                        <textarea class="form-control" id="Responsabilite" rows="4" name="responsabilite" required></textarea>
                    </div>

                </div>
                <div class="col-md-5 offset-1">

                    <div class="mb-3">
                        <label for="Description" class="form-label">Description:</label>
                        <textarea class="form-control" id="Description" rows="4" name="Description"  required> <?php echo $postenom[0]['descri'] ;?></textarea>
                    </div>
                </div>
            </div>
            <h3>Qualification:</h3>
            <div class="row">
                <div class="col-md-5 ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="Post" class="form-label ">Age minimum:</label>
                                <input type="number" class="form-control" id="Post" min="15" name="ageMIn" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="Post" class="form-label ">Age maximum:</label>
                                <input type="number" class="form-control" id="Post" name="ageMax" required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 ">
                    <div class="input-group mb-3">
                        <select class="form-select" id="inputGroupSelect02" name="diplomes">

                            <option value="<?php echo $diplomes[0]['idGrade'] ?>" selected><?php echo $diplomes[0]['titre'] ?></option>

                        </select>
                        <label class="input-group-text" for="inputGroupSelect02">Diplomes</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="Responsabilite" class="form-label">Experiences:</label>
                        <textarea class="form-control" id="Responsabilite" rows="4" name="experience" required></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="Responsabilite" class="form-label">Autre(s) exigence(s):</label>
                        <textarea class="form-control" id="Responsabilite" rows="4" name="AutreExigences" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ">
                    <div class="mb-3">
                        <label for="Datelimite" class="form-label ">Date:</label>
                        <input type="date" class="form-control" id="Datelimite" name="date">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-7 ">
                    <input type="submit" value="valider" class="btn btn-primary btn-lg">
                </div>

            </div>
        </form>
    </div>

</body>

</html>