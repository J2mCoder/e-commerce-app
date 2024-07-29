<?php require("require/login.php") ?>
<section class="section-login">
  <div class="container">
    <form action="" method="post">
      <div class="formulaire">
        <div class="title">
          <h1>Se connecter</h1>
          <p>Connectez-vous pour profiter de nos offres exceptionnelles.</p>
          <div class="underline"></div>
        </div>
        <div class="content">
          <?php if(isset($ErrorMsg)) { ?>
          <div class="errorMsg">
            <p><?php if (isset($ErrorMsg)) echo $ErrorMsg; ?></p>
          </div>
          <?php } ?>
          <div class="input-box">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>"
              id="email" placeholder="Entrez votre email">
          </div>
          <div class="input-box">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe">
          </div>
          <div class="btn-box">
            <button type="submit" name="submit-login" class="btn-primary">Se connecter</button>
          </div>
          <div class="forgot-password"></div>
          <div class="link">
            <p>Vous n'avez pas de compte?</p>
            <a href="index.php?page=register">Créer un compte</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>