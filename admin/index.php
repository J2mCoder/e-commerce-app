<?php
session_start();
require ("../db/connect_db.php");

if (!isset($_SESSION["ADMIN"])) {
  header("Location: ../index.php");
  exit();
}

$ErrorMsg = null;

$select_marque = $connect_db->query("SELECT * FROM marque");

if (isset($_POST["subimit-produit"])) {
  if (
    !empty($_POST["produit"]) && !empty($_POST["description"])
    && !empty($_POST["color"]) && !empty($_POST["marque"]) && !empty($_POST["prix"])
    && !empty($_POST["status"])
  ) {

    $produit = strip_tags(trim($_POST["produit"]));
    $description = strip_tags(trim($_POST["description"]));
    $marque = strip_tags(trim($_POST["marque"]));
    $color = strip_tags(trim($_POST["color"]));
    $prix = strip_tags(trim($_POST["prix"]));
    $status = strip_tags(trim($_POST["status"]));


    if (!empty($_POST["color2"])) {
      $color2 = strip_tags($_POST["color2"]);
    } else {
      $color2 = null;
    }
    if (!empty($_POST["color3"])) {
      $color3 = strip_tags($_POST["color3"]);
    } else {
      $color3 = null;
    }
    if (!empty($_POST["color4"])) {
      $color4 = strip_tags($_POST["color4"]);
    } else {
      $color4 = null;
    }
    if (!empty($_POST["color5"])) {
      $color5 = strip_tags($_POST["color5"]);
    } else {
      $color5 = null;
    }

    if (strlen($produit) > 2 && strlen($produit) < 60) {
      if (strlen($description) > 5 && strlen($description) < 255) {
        if (is_numeric($marque) && $marque != 0) {
          if (is_string($color)) {
            if (is_numeric($status) && $status == 1 || $status == 2) {
              if (is_numeric($prix)) {
                $sizemax = 5097152;
                $extvalide = array("jpg", "png", "jpeg");
                if (isset($_FILES["file"]["name"]) && !empty($_FILES["file"]["name"])) {
                  $file = strip_tags($_FILES["file"]["name"]);
                  $extload = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                  $name_file = "photo-" . substr(str_shuffle("123456789012345678901234567890"), 0, 9);

                  if ($_FILES["file"]["size"] <= $sizemax) {
                    if (in_array($extload, $extvalide)) {
                      $chemin = "../assets/image/produit/" . $name_file . "." . $extload;
                      $resultat = move_uploaded_file($_FILES["file"]["tmp_name"], $chemin);
                      $file = "assets/image/produit/" . $name_file . "." . $extload;

                      $token = md5(uniqid(rand()));

                      $insert = $connect_db->prepare("INSERT INTO produit(produit,description,image,marque,prix,url,status,date) VALUES(?,?,?,?,?,?,?,now())");
                      $insert->execute([$produit, $description, $file, $marque, $prix, $token, $status]);

                      $select = $connect_db->query("SELECT id_produit FROM produit WHERE url = '$token'");
                      $prodid = $select->fetch(PDO::FETCH_ASSOC);

                      $insert = $connect_db->prepare("INSERT INTO colors(colorOne,colorTwo,colorTree,colorFor,colorFive,id_produit) VALUES(?,?,?,?,?,?)");
                      $insert->execute([$color, $color2, $color3, $color4, $color5, $prodid["id_produit"]]);

                      $ErrorMsg = "good job !";
                    } else {
                      $ErrorMsg = "Mauvais format, l'extention de votre photo doit être de (jpg, jpeg, png)";
                    }
                  } else {
                    $ErrorMsg = "Votre photo ne doit pas avoir plus d'une taille de 2 Mo";
                  }
                } else {
                  $ErrorMsg = "Veuillez selectionner une photo";
                }
              } else {
                $ErrorMsg = "Le prix est incorrecte";
              }
            } else {
              $ErrorMsg = "Le status est invalide";
            }
          } else {
            $ErrorMsg = "La couleur doit être une chaine de caractères";
          }
        } else {
          $ErrorMsg = "La marque ne pas valide";
        }
      } else {
        $ErrorMsg = "La description doit être comprise entre 5 et 255 caractères";
      }
    } else {
      $ErrorMsg = "Le nom doit avoir entre 3 et 60 caractères";
    }

  } else {
    $ErrorMsg = "Veuillez remplir tous les champs !";
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
  <?php
  if (isset($_SESSION["ADMIN"]) && !isset($_GET["page"])) {
    header("Location: index.php?page=home");
    exit();
  }
  require ("widget/header.php");

  switch ($_GET["page"]) {
    case 'home':
      require ("page/Home.php");
      break;
    case "profil":
      require ("page/Profil.php");
      break;
    default:
      require ("page/Home.php");
      break;
  }

  ?>



  <script src="../js/main.js"></script>
</body>

</html>