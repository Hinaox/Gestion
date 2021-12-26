<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo site_url("assets/css/bootstrap.min.css")?>" rel="stylesheet">
    <title>Test Pagination</title>
</head>

<body>
    <div class="container">

        <div class="py-5 text-center">
            <h2>Test Pagination</h2>
        </div>

    	<nav aria-label="...">
		  <ul class="pagination">
		    <li class="page-item disabled">
		      <span class="page-link">Previous</span>
		    </li>
		    <input type="hidden" id="site" value="<?php echo site_url() ?>">
		    <?php for($i=1;$i<$nbPage;$i++) {?>
		    	<li class="page-item" id="indicePage<?php echo $i ;?>" value="<?php echo $i?>">
		    		<span  class="page-link"  onclick="paginer(<?php echo $i ?>)"><?php echo $i?>
		    			
		    		</span>
		    	</li>
			<?php }?>
		    <li class="page-item">
		      <a class="page-link" href="#">Next</a>
		    </li>
		  </ul>
		</nav>

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
            <tbody id="tableaux">
                <?php for($i=0;$i<count($listeBP);$i++) {?>
                    <tr >
                        <th scope="row"><?php echo $i+1 ;?></th>
                        <td><?php echo $listeBP[$i]['nom']." ".$listeBP[$i]['prenom'] ;?></td>
                        <td><?php echo $listeBP[$i]['idFichePaie'] ;?></td>
                        <td><?php echo $listeBP[$i]['dateMiseEnPlace'] ;?></td>
                        <td><?php echo $listeBP[$i]['net'] ;?>AR</td>
                        <td><a class="btn btn-info" href=<?php echo site_url("BPController/getBP?idFichePai=".$listeBP[$i]['idFichePaie']);?> role='button'  >INFO</a></td>        
                    </tr>
                <?php }?>
            </tbody>
        </table>
        <a href="#" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Retour</a>
    </div>

    <script src="<?php echo site_url("application/bootstrap/js/jquery.js")?>"></script>
    <script src="<?php echo site_url("application/bootstrap/js/bootstrap.min.js")?>"></script>

    <script src="<?php echo site_url('assets/js/ajaxBP.js')?>"></script>
</body>

</html>