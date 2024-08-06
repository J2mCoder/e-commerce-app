<?php
require ("require/Profile.php")
  ?>
<section class="section-profile">
  <div class="container">
    <div class="grid">
      <div class="avatar">
        <img src="assets/image/img/avatar.png" alt="">
      </div>
      <div class="informations">
        <h1><?php echo $USER['prenom'] . " " . $USER['nom']; ?></h1>
        <p> Email : <?php echo $USER['email']; ?></p>
        <p> Adresse : <?php echo $USER['adress']; ?></p>
      </div>
      <div class="setting">
        <a href="index.php?page=logout">Déconnexion <i class="fa-solid fa-right-from-bracket"></i></a>
      </div>
    </div>
  </div>
</section>