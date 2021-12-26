<div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
      <?php if ($emp['sexe']=="F"){ ?>
          <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="" width="32" height="32" class="rounded-circle me-2">
      <?php } else { ?>
          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" width="32" height="32" class="rounded-circle me-2">
      <?php } ?>  
        <strong><?php echo $emp['nom'].' '.$emp['prenom']; ?></strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href=<?php echo site_url("profilController/"); ?>>Profil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="<?php echo site_url('LogoutCtrl/'); ?>">Se deconnecter</a></li>
      </ul>
    </div>