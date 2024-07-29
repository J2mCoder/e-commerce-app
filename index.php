<?php session_start();
?>
<!DOCTYPE html>
<html lang='fr'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link rel='stylesheet' href='css/style.css'>
  <link rel='stylesheet' href='assets/fontawesome-free-6.6.0-web/css/all.min.css'>
  <title>E-commerce</title>
</head>

<body>

  <?php
  if (!isset($_GET['page'])) {
    header('Location: /e-commerce-app/index.php?page=home');
    exit();
  }
  require ('widgets/header.php');

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
      case 'login':
        require ('page/Login.php');
        break;
      case 'register':
        require ('page/Register.php');
        break;
      case 'profile':
        require ('page/Profile.php');
        break;
      case 'home':
        require ('widgets/hero-section.php');
        require ('widgets/Boutique.php');
        require ('widgets/solde.php');
        require ('widgets/marque.php');
        require ('widgets/Contact.php');
        require ('widgets/footer.php');
        break;
      case 'search':
        require ('page/Search.php');
        break;
      case 'panier':
        require ('page/Panier.php');
        break;
      case 'logout':
        require ('require/log-out.php');
        break;
      default:
        require ('page/404.php');
        break;
    }
  }

  if (isset($page) && $page == 'home') { ?>
    <button id='theme-toggle' class='theme-toggle'><i class='fa-solid fa-arrow-up'></i></button>
  <?php } ?>

  <script src='js/main.js'></script>
</body>

</html>