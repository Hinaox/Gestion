
  
      <div class="container">
        <div class="md-2"></div>
      <div class="py-3 text-center">
        <h2>Modification IRSA</h2>
        <p class="lead">Formulaire de Modification Par Tranche</p>
        <?php if(isset($succes)){ ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $succes;?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
      </div>

      <form action="<?php echo site_url('IrsaController/updateIrsa'); ?>" method="post">
        <div class="row g-3">
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">1ère Tranche</h4>

            <div class="row g-3">
              <div class="col-sm-6">
                <label for="max" class="form-label">Max</label>
                <input type="number" class="form-control" id="max" placeholder="<?php echo $irsa[0]['montantMax']; ?>" value="" name="max1">
              </div>
              <div class="col-sm-6">
                <label for="taux" class="form-label">Taux</label>
                <input type="number" class="form-control" id="taux" placeholder="<?php echo $irsa[0]['taux']; ?>" value="" name="taux1">
              </div>
            </div>
          </div>

          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">2ème Tranche</h4>
            <div class="row g-3">
              <div class="col-sm-3">
                <label for="min" class="form-label">Min</label>
                <input type="number" class="form-control" id="min" placeholder="<?php echo $irsa[1]['montantMin']; ?>" value="" name="min2">

              </div>
              <div class="col-sm-3">
                <label for="max" class="form-label">Max</label>
                <input type="number" class="form-control" id="max" placeholder="<?php echo $irsa[1]['montantMax']; ?>" value="" name="max2">

              </div>
              <div class="col-sm-3">
                <label for="taux" class="form-label">Taux</label>
                <input type="number" class="form-control" id="taux" placeholder="<?php echo $irsa[1]['taux']; ?>" value="" name="taux2">

              </div>
            </div>
          </div>
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">3ème Tranche</h4>
            <div class="row g-3">
              <div class="col-sm-3">
                <label for="min" class="form-label">Min</label>
                <input type="number" class="form-control" id="min" placeholder="<?php echo $irsa[2]['montantMin']; ?>" value="" name="min3">

              </div>
              <div class="col-sm-3">
                <label for="max" class="form-label">Max</label>
                <input type="number" class="form-control" id="max" placeholder="<?php echo $irsa[2]['montantMax']; ?>" value="" name="max3">

              </div>
              <div class="col-sm-3">
                <label for="taux" class="form-label">Taux</label>
                <input type="number" class="form-control" id="taux" placeholder="<?php echo $irsa[2]['taux']; ?>" value="" name="taux3">

              </div>
            </div>
          </div>
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">4ème Tranche</h4>
            <div class="row g-3">
              <div class="col-sm-3">
                <label for="min" class="form-label">Min</label>
                <input type="number" class="form-control" id="min" placeholder="<?php echo $irsa[3]['montantMin']; ?>" value="" name="min4">

              </div>
              <div class="col-sm-3">
                <label for="max" class="form-label">Max</label>
                <input type="number" class="form-control" id="max" placeholder="<?php echo $irsa[3]['montantMax']; ?>" value="" name="max4">

              </div>
              <div class="col-sm-3">
                <label for="taux" class="form-label">Taux</label>
                <input type="number" class="form-control" id="taux" placeholder="<?php echo $irsa[3]['taux']; ?>" value="" name="taux4">

              </div>
            </div>
          </div>
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">5ème Tranche</h4>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="min" class="form-label">Min</label>
                <input type="number" class="form-control" id="min" placeholder="<?php echo $irsa[4]['montantMin']; ?>" value="" name="min5">

              </div>
              <div class="col-sm-6">
                <label for="taux" class="form-label">Taux</label>
                <input type="number" class="form-control" id="taux" placeholder="<?php echo $irsa[4]['taux']; ?>" value="" name="taux5">

              </div>
            </div>
          </div>
          <button class="w-100 btn btn-success btn-lg" type="submit">Modifier</button>
          

        </div>

      </form>
        </div>

