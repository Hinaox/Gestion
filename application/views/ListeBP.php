<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo site_url("bootstrap/css/bootstrap.css")?> rel="stylesheet">
    <title>Bootstrap</title>
</head>

<body>
    <div class="container">
        <div class="py-5 text-center">

            <h2>Liste Bulletin De Paie</h2>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom Prenom</th>
                    <th scope="col">Ref Bulletin</th>
                    <th scope="col">Date</th>
                    <th scope="col">Net a Payer</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Jean Jean</td>
                    <td>52582</td>
                    <td>12/12/12</td>
                    <td>.....Ar</td>
                    <td><a class="btn btn-info" href="bulletin.html" role="button">INFO</a></td>
                </tr>
            </tbody>
        </table>
        <a href="#" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Retour</a>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>