<?php require ("require/contact.php"); ?>
<section class="section-contact" id="Contact">
  <div class="container">
    <div class="title">
      <h1>Contactez-nous</h1>
      <p>N'hésitez pas à nous envoyer un message <br> si vous avez des questions ou souhaitez nous contacter.</p>
      <div class="underline"></div>
    </div>
    <div class="content-contact">
      <form method="post" class="formulaire">
        <div class="box-content">
          <div class="box-title">
            <h1>Envoyez-nous un message</h1>
            <div style="width: 50%; height: 4px; background: #f5f5f5; border-radius: 10px; margin-top: 10px"></div>
          </div>
          <?php if (isset($ErrorMsg)) { ?>
            <div class="errorMsg" style="background: red; padding: 10px; border-radius: 10px;">
              <p><?= $ErrorMsg; ?></p>
            </div>
          <?php } ?>
          <?php if (isset($success)) { ?>
            <div class="errorMsg" style="background: green; padding: 10px; border-radius: 10px;">
              <p><?= $success; ?></p>
            </div>
          <?php } ?>
          <div class="input-box">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" placeholder="Entrez votre nom">
          </div>
          <div class="input-box">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Entrez votre email">
          </div>
          <div class="input-box">
            <label for="message">Message</label>
            <textarea name="message" id="message" placeholder="Entrez votre message"></textarea>
          </div>
          <div class="btn-box">
            <button type="submit" name="submit-message" class="btn-primary">Envoyer</button>
          </div>
        </div>
      </form>
      <div class="illustration">
        <img src="assets/image/img/contact.png" alt="">
      </div>
    </div>
  </div>
</section>