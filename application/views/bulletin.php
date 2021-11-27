<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
    <link href="<?php site_url("assets/css/bootstrap.css")?>" rel="stylesheet">




    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">

            <h2>Bulletin De Paie</h2>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">

                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Date</h6>

                        </div>
                        <span class="text-muted">12/12/12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Societe</h6>

                        </div>
                        <span class="text-muted">Star</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Matricule</h6>

                        </div>
                        <span class="text-muted">51451</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Nom</h6>

                        </div>
                        <span class="text-muted">Jean Jean</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="py text-center">

            <h5>Remuneration En Numeraire</h5>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Taux</th>
                    <th scope="col">Montant</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Salaire Fixe</th>
                    <td>12313</td>
                    <td>taux %</td>
                    <td>montant en ar</td>
                </tr>
                <tr>
                    <th scope="row">Indamnite</th>
                    <td>12313</td>
                    <td>taux %</td>
                    <td>montant en ar</td>
                </tr>
                <tr>
                    <th scope="row">Prime</th>
                    <td>12313</td>
                    <td>taux %</td>
                    <td>montant en ar</td>
                </tr>
                <tr>
                    <th scope="row">Total</th>
                    <td>12123131</td>
                    <td></td>
                    <td>montant total en ar</td>
                </tr>
            </tbody>
        </table>
        <a href="#" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Liste Bulletin</a>



    </div>

</body>

</html>