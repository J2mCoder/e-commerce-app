<?php
session_start();
require("../db/connect_db.php");

if (isset($_SESSION["ADMIN"])) {
  
} else {
  header("Location: ../index.php");
  exit();
}

$ErrorMsg = null;

$select_marque = $connect_db->query("SELECT * FROM marque");

if (isset($_POST["subimit-produit"])) {
  $sizemax = 5097152;
  $extvalide = array("jpg", "png", "jpeg");
  if (isset($_FILES["file"]["name"])) {
    $file = strip_tags($_FILES["file"]["name"]);
    $extload = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $name_file = "photo-" . substr(str_shuffle("123456789012345678901234567890"), 0, 9);
    
    if ($_FILES["file"]["size"] <= $sizemax) {
      if (in_array($extload, $extvalide)) {
        $chemin ="../assets/image/produit/" . $name_file . "." . $extload;
        $resultat = move_uploaded_file($_FILES["file"]["tmp_name"], $chemin);
        $file = $name_file . "." . $extload;
      } else { $ErrorMsg = "Mauvais format, l'extention de votre photo doit être de (jpg, jpeg, png)";}
    } else { $ErrorMsg = "Votre photo ne doit pas avoir plus d'une taille de 2 Mo";}
  }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../assets/fontawesome-free-6.6.0-web/css/all.min.css">
  <title>E-commerce</title>
</head>

<body>
  <form method="post" enctype="multipart/form-data">
    <section class="section-admin">
      <?php require("widget/header.php"); ?>
      <br><br><br><br>
      <div class="container flex">
        <div class="content">
          <div class="title">
            <h1>Admin</h1>
            <p>Ce site est le point de contact de l'administration de l'E-Shop.</p>
            <div class="underline"></div>
          </div>
          <div class="formulaire">
            <div class="file">

              <label for="file">
                <i class="fa-solid fa-upload"></i>
              </label>
              <input type="file" name="file" id="file" accept="image/*">
            </div>
            <div class="box-content">
              <div class="ErrorMsg" style="color:red; padding: 10px 0;">
                <p><?php if (isset($ErrorMsg)) echo $ErrorMsg; ?></p>
              </div>
              <div class="input-box">
                <label for="produit">Produit</label>
                <input type="text" name="produit" id="produit" placeholder="Entrez votre produit">
              </div>
              <div class="input-box">
                <label for="description">description</label>
                <textarea name="description" id="description" placeholder="Entrez une déscription"></textarea>
              </div>
              <div class="input-box">
                <label for="color">Couleur</label>
                <input type="text" name="color" id="color" placeholder="Entrez une couleur">
                <label for="">(Optionnel)</label>
                <input type="text" name="color2" id="color2" placeholder="Entrez une couleur">
                <input type="text" name="color3" id="color3" placeholder="Entrez une couleur">
                <input type="text" name="color4" id="color4" placeholder="Entrez une couleur">
                <input type="text" name="color5" id="color5" placeholder="Entrez une couleur">
              </div>
              <div class=" input-box">
                <label for="marque">Marque</label>
                <select name="marque" id="marque">
                  <option value="">-- Marque</option>
                  <?php while ($marque = $select_marque->fetch()) { ?>
                  <option value="<?= $marque["id_marque"] ?>">
                    <?= $marque["name"] ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
              <div class="input-box">
                <label for="prix">Prix</label>
                <input type="text" name="prix" id="prix" placeholder="Entrez le prix">
              </div>
              <div class="btn-box">
                <button type="submit" name="subimit-produit">Ajouter</button>
              </div>
            </div>
          </div>
        </div>
    </section>
  </form>

  <script src="../js/main.js"></script>
</body>

</html>