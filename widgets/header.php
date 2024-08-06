<header>
  <div class="container">
    <div class="navigation">
      <div class="logo"><a href="">E-Shop</a></div>
      <div class="nav-links">
        <?php
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
          if ($page == "home") { ?>
            <ul>
              <li>
                <?php if (isset($_SESSION["ADMIN"])) { ?>
                  <a href="admin/index.php?page=home">Accueil</a>
                <?php } else { ?>
                  <a href="#Accueil">Accueil</a>
                <?php } ?>
              </li>
              <li><a href="#Boutique">Boutique</a></li>
              <li><a href="#Promotion">Promotion</a></li>
              <li><a href="#Marque">Marque</a></li>
              <li><a href="#Contact">Contact</a></li>
            </ul>
          <?php } else { ?>
            <ul>
              <li><a href="index.php?page=home#Accueil">Accueil</a></li>
              <li><a href="index.php?page=home#Boutique">Boutique</a></li>
              <li><a href="index.php?page=home#Promotion">Promotion</a></li>
              <li><a href="index.php?page=home#Marque">Marque</a></li>
              <li><a href="index.php?page=home#Contact">Contact</a></li>
            </ul>
          <?php }
        } ?>

      </div>
      <div class="nav-icons">
        <ul>
          <li><a href="index.php?page=search" id="open-search-btn"><i class="fa-solid fa-magnifying-glass"></i></a></li>
          <li>
            <a href="index.php?page=panier" class="cart"><i
                class="fa-solid fa-cart-shopping"></i><?php if (isset($_SESSION['panier'])) { ?><span>
                  <?php echo count($_SESSION['panier']); ?>
                </span><?php } ?>
            </a>
          </li>
          <li>
            <?php if (isset($_SESSION["ADMIN"])) { ?>
              <a href="admin/index.php?page=profile"><i class="fa-solid fa-user"></i></a>
            <?php } else { ?>
              <a href="index.php?page=profile"><i class="fa-solid fa-user"></i></a>
            <?php } ?>
          </li>
        </ul>
      </div>
      <div class="burger-menu">
        <button type="button" id="burger-btn">
          <i class="fa-solid fa-bars"></i>
        </button>
      </div>
    </div>
  </div>
</header>

<div class="burger-menu-content" id="burger-menu-content">
  <button type="button" class="close-menu" id="close-menu">
    <i class="fa-solid fa-times"></i>
  </button>
  <ul>
    <li><a href="#Accueil">Accueil</a></li>
    <li><a href="#Boutique">Boutique</a></li>
    <li><a href="#Promotion">Promotion</a></li>
    <li><a href="#Marque">Marque</a></li>
    <li><a href="#Contact">Contact</a></li>
  </ul>
</div>