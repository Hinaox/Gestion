<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    </link>
    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
    
    <title>Document</title>
</head>
<body>
    <p>
        <h1>liste des demandes d'achat non grouper/valider</h1>
    </p>
    <form action="<?php /*echo site_url('DemandeAchatController/grouper');*/ ?>" method="get">
        <table border='1' class="table table-striped">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">materiel</td>
                    <th scope="col">quantite</td>
                    <th scope="col">unite</td>
                    <th scope="col">nom departement</td>
                    <th scope="col">etat</td>
                </tr>
            <?php for($i=0;$i<count($demande);$i++) { ?>
                <tr>
                    <td scope="row"><?php echo $i+1; ?></td>
                    <td><?php echo $demande[$i]['label'] ?></td>
                    <td><?php echo $demande[$i]['quantite'] ?></td>
                    <td><?php echo $demande[$i]['unite'] ?></td>
                    <td><?php echo $demande[$i]['nom'] ?></td>
                    <td><?php echo $demande[$i]['etat'] ?></td>
                    <td>
                        <a href="<?php echo site_url('DemandeAchatController/refuserDemande?id='.$demande[$i]['id']); ?>" class="btn btn-danger" onclick="confirm('voulez vous vraiment refuser cette demande ?')">refuser</a>
                        <!-- <a href="<?php echo site_url('DemandeAchatController/refuserDemande?id='.$demande[$i]['id']); ?>" class="btn btn-danger" onclick="afficherPopupInformation()">refuser</a> -->
                        <!-- <a href="" data-confirm="Etes-vous certain de vouloir supprimer?">Suppression</a> -->
                        <!-- <button type="" onclick="afficherPopupInformation()">refuser</button> -->
                    </td>
                    <td  class="form-check">
                        <input class="form-check-label" type="checkbox" name="aGrouper[]" value="<?php echo $demande[$i]['id'] ?>" id="">
                    </td>
                </tr>
            <?php } ?>
        </table>
        <input type="submit" class="btn btn-primary" value="grouper/valider">
    </form>
    <script>
        $(function() {
            $('a[data-confirm]').click(function(ev) {
                var href = $(this).attr('href');
                
                if (!$('#dataConfirmModal').length) {
                    $('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Merci de confirmer</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-danger" id="dataConfirmOK">Oui</a></div></div></div></div>');
                }
                $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
                $('#dataConfirmOK').attr('href', href);
                $('#dataConfirmModal').modal({show:true});
                
                return false;
            });
        });
        </script>
</body>
</html>