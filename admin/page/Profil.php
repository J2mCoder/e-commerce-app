<?php

require ("../db/connect_db.php");
if (isset($_SESSION["ADMIN"]) && !empty($_SESSION["ADMIN"])) {
  $token = $_SESSION["ADMIN"];
  $select = $connect_db->query("SELECT * FROM admin WHERE url = '$token'");
  $ADMIN = $select->fetch();
  if ($select->rowCount() == 0) {
    header("Location: /e-commerce-app/index.php?page=logout");
    exit();
  }



  if (isset($_POST["submit-admin-profil"])) {

    if (!empty($_POST["firstname"])) {
      $firstname = strip_tags($_POST["firstname"]);
      if ($firstname != $ADMIN["firstname"]) {
        if (strlen($firstname) >= 3) {
          $update = $connect_db->prepare("UPDATE admin SET firstname = ? WHERE url = ?");
          $update->execute([$firstname, $token]);
          $SuccessMsg = "Prénom mis à jour avec success";
        } else {
          $ErrorMsg = "Le prénom doit contenir au moins 3 caractères";
        }
      }
    } else {
      $ErrorMsg = "Veuillez remplir le champ du prénom";
    }

    if (!empty($_POST["lastname"])) {
      $lastname = strip_tags($_POST["lastname"]);
      if ($lastname != $ADMIN["lastname"]) {
        if (strlen($lastname) >= 3) {
          $update = $connect_db->prepare("UPDATE admin SET lastname = ? WHERE url = ?");
          $update->execute([$lastname, $token]);
          $SuccessMsg = "Nom mis à jour avec success";
        } else {
          $ErrorMsg = "Le nom doit contenir au moins 3 caractères";
        }
      }
    } else {
      $ErrorMsg = "Veuillez remplir le champ du nom";
    }

    if (!empty($_POST["email"])) {
      $email = strip_tags($_POST["email"]);
      if ($email != $ADMIN["email"]) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $update = $connect_db->prepare("UPDATE admin SET email = ? WHERE url = ?");
          $update->execute([$email, $token]);
          $SuccessMsg = "Email mis à jour avec success";
        } else {
          $ErrorMsg = "Email invalide";
        }
      }
    } else {
      $ErrorMsg = "Veuillez remplir le champ de l'email";
    }

    if (!empty($_POST["password"]) && !empty($_POST["newpassword"])) {
      $password = strip_tags($_POST["password"]);
      $newpassword = strip_tags($_POST["newpassword"]);
      if (password_verify($password, $ADMIN["password"])) {
        if (strlen($newpassword) >= 6) {
          if ($newpassword != $password) {
            $passConfirmation = $newpassword;
            $pass = password_hash($passConfirmation, PASSWORD_DEFAULT);
            $update = $connect_db->prepare("UPDATE admin SET password = ? WHERE url = ?");
            $update->execute([$pass, $token]);
            $SuccessMsg = "Mot de passe mis à jour avec success";
          } else {
            $ErrorMsg = "Le nouveau mot de passe doit être different du mot de passe actuel";
          }
        } else {
          $ErrorMsg = "Le mot de passe doit contenir au moins 6 caractères";
        }
      } else {
        $ErrorMsg = "Mot de passe incorrect";
      }
    }

    if ($update) {
      header("Location:index.php?page=profil");
    }

  }

} else {
  header("Location: /e-commerce-app/index.php?page=login");
  exit();
}
?>
<br><br>
<section class="section-admi-profil">
  <div class="container">
    <div class="grid-box">
      <div class="grid-left">
        <div class="avatar">
          <img src="../assets/image/img/avatar.png" width="320" alt="">
        </div>
        <div class="informations">
          <h1><?php echo $ADMIN['firstname'] . " " . $ADMIN['lastname']; ?></h1>
          <p><?php echo $ADMIN['email']; ?></p>
          <p><b>Administrateur</b></p>
        </div>
        <div class="setting">
          <a href="/e-commerce-app/index.php?page=logout">Déconnexion <i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>
      <div class="grid-right">
        <form method="post" class="setting-admin">
          <div class="title">
            <h1>Modifier votre profil</h1>
          </div>
          <?php if (isset($ErrorMsg)) { ?>
            <div class="errorMessage" <p><?php echo $ErrorMsg; ?></p>
            </div>
          <?php }
          if (isset($SuccessMsg)) { ?>
            <div class="successMessage">
              <p><?php echo $SuccessMsg; ?></p>
            </div>
          <?php } ?>
          <div class="input-box">
            <label for="firstname">Prénom</label>
            <input type="text" name="firstname" id="firstname" value="<?php if (isset($_POST['firstname'])) {
              echo $_POST['firstname'];
            } else {
              echo $ADMIN['firstname'];
            } ?>" placeholder="Entrez votre prénom">
          </div>
          <div class="input-box">
            <label for="lastname">Nom</label>
            <input type="text" name="lastname" id="lastname" value="<?php if (isset($_POST['lastname'])) {
              echo $_POST['lastname'];
            } else {
              echo $ADMIN['lastname'];
            } ?>" placeholder="Entrez votre nom">
          </div>
          <div class="input-box">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php if (isset($_POST['email'])) {
              echo $_POST['email'];
            } else {
              echo $ADMIN['email'];
            } ?>" placeholder="Entrez votre email">
          </div>
          <div class="input-box">
            <label for="password">Ancien mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Ancien mot de passe">
          </div>
          <div class="input-box">
            <label for="newpassword">Nouveau mot de passe</label>
            <input type="password" name="newpassword" id="newpassword" placeholder="Nouveau mot de passe">
          </div>
          <div class="input-box">
            <button name="submit-admin-profil">
              Modifier
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<br><br><br>