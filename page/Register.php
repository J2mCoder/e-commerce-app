<?php 
require("require/register.php")
?>
<br><br><br>
<section class="section-register">
  <div class="container">
    <form action="" method="post">
      <div class="formulaire">
        <div class="title">
          <h1>S'inscrire</h1>
          <p>Inscrivez-vous pour profiter de nos offres exceptionnelles.</p>
          <div class="underline"></div>
        </div>
        <div class="content">
          <?php if(isset($ErrorMsg)) { ?>
          <div class="errorMsg">
            <p><?php if (isset($ErrorMsg)) echo $ErrorMsg; ?></p>
          </div>
          <?php } ?>
          <div class="fullname">
            <div class="input-box">
              <label for="name">Nom</label>
              <input type="text" name="lastname" id="name"
                value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>"
                placeholder="Entrez votre nom" required>
            </div>
            <div class="input-box">
              <label for="firstname">Prénom</label>
              <input type="text" name="firstname" id="firstname"
                value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>"
                placeholder="Entrez votre prénom" required>
            </div>
          </div>
          <div class="input-box">
            <label for="email">Email</label>
            <input type="email" name="email" id="email"
              value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" placeholder="Entrez votre email"
              required>
          </div>
          <div class="input-box">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse"
              value="<?php if(isset($_POST['adresse'])) { echo $_POST['adresse']; } ?>"
              placeholder="Entrez votre adresse" required>
          </div>
          <div class="fullname">
            <div class="input-box">
              <label for="age">Age</label>
              <input type="number" name="age" id="age" value="<?php if(isset($_POST['age'])) { echo $_POST['age']; } ?>"
                min="18" placeholder="Entrez votre age" required>
            </div>
            <div class="input-box">
              <label for="sexe">sexe</label>
              <select name="sexe" id="sexe" required>
                <option>-- Sexe</option>
                <option value="1"
                  selected="<?php if(isset($_POST['sexe']) && $_POST['sexe'] == 1) { echo "selected"; } ?>">Homme
                </option>
                <option value="2"
                  selected="<?php if(isset($_POST['sexe']) && $_POST['sexe'] == 2) { echo "selected"; } ?>">Femme
                </option>
              </select>
            </div>
          </div>
          <div class="input-box">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required>
          </div>
          <div class="input-box">
            <label for="confirm-password">Confirmer le mot de passe</label>
            <input type="password" name="confirm-password" id="confirm-password"
              placeholder="Confirmez votre mot de passe" required>
          </div>
          <div class="btn-box">
            <button type="submit" name="submit-register" class="btn-primary">S'inscrire</button>
          </div>
          <div class="link">
            <p>Vous avez déjà un compte ?</p>
            <a href="index.php?page=login">Connectez-vous maintenant</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<br><br><br>