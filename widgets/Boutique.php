<?php
require ("db/connect_db.php");
require_once ("require/add-to-panier.php");
$SelectProduit = $connect_db->query("SELECT * FROM produit WHERE status=1 ORDER BY id_produit DESC");
$CountProduit = $SelectProduit->rowCount();

?>
<section class="section-boutique" id="Boutique">
  <div class="container">
    <div class="content">
      <div class="title">
        <h1>Boutique</h1>
        <div class="underline"></div>
      </div>
      <div class="grid-box">
        <div class="left">
          <div class="header">
            <h1>Filtres</h1>
          </div>
          <form methode="post" action="/e-commerce-app" class="items">
            <?php for ($i = 0; $i < 3; $i++) { ?>
              <div class="accord">
                <div class="accord-header">
                  <div class="title">
                    <h3>Catégorie</h3>
                  </div>
                  <div class="icon"><i class="fa-solid fa-plus"></i></div>
                </div>
                <div class="accord-body">
                  <div class="item">
                    <input type="checkbox" name="" id="">
                    <span></span>
                    <label for="">Lorem, ipsum dolor.</label>
                  </div>
                  <div class="item">
                    <input type="checkbox" name="" id="">
                    <span></span>
                    <label for="">Lorem, ipsum dolor.</label>
                  </div>
                  <div class="item">
                    <input type="checkbox" name="" id="">
                    <span></span>
                    <label for="">Lorem, ipsum dolor.</label>
                  </div>
                </div>
                <div class="accord-footer"></div>
              </div>
              <div class="accord">
                <div class="accord-header">
                  <div class="title">
                    <h3>Couleur</h3>
                  </div>
                  <div id="icon-accord" class="icon"><i class="fa-solid fa-plus"></i></div>
                </div>
                <div class="accord-body">
                  <div class="item">
                    <input type="checkbox" name="choix" value="rambo" id="">
                    <span></span>
                    <label for="">Lorem, ipsum dolor.</label>
                  </div>
                  <div class="item">
                    <input type="checkbox" name="" id="">
                    <span></span>
                    <label for="">Lorem, ipsum dolor.</label>
                  </div>
                  <div class="item">
                    <input type="checkbox" name="" id="">
                    <span></span>
                    <label for="">Lorem, ipsum dolor.</label>
                  </div>
                </div>
                <div class="accord-footer"></div>
              </div>
            <?php } ?>
            <div class="accord-validate">
              <input type="submit" value="Valider">
              <input type="reset" value="Réinitialiser">
            </div>
          </form>
        </div>
        <div class="right">
          <div class="header">
            <div class="">
              <h1><span><?= $CountProduit ?></span><span> produit(s)</span></h1>
            </div>
            <br>
          </div>
          <div class="grid">
            <?php while ($produits = $SelectProduit->fetch()) { ?>
              <div class="card">
                <div class="card-body">
                  <div class="like-content">
                    <input type="checkbox" title="1K like" name="like" id="<?= $i ?>">
                    <label for="<?= $i ?>">
                      <i class="fa-solid fa-heart"></i>
                    </label>
                  </div>
                  <img src="<?php echo $produits["image"] ?>" alt="">
                </div>
                <div class="card-footer">
                  <div class="content-info">
                    <h3><?= $produits["produit"]; ?></h3>
                    <div class="colors">
                      <div class="color" style="background-color: red"></div>
                      <div class="color" style="background-color: yellow"></div>
                      <div class="color" style="background-color: pink"></div>
                      <div class="color" style="background-color: green"></div>
                      <div class="color" style="background-color: blue"></div>
                      <div class="color">+5</div>
                    </div>
                  </div>
                  <div class="content-store">
                    <p class="price"><?= $produits["prix"] . "$"; ?></p>
                    <a href="index.php?page=home&action=add-to-panier&id=<?= $produits["url"] ?>"
                      title="Ajouter au panier" class="store">
                      <i class="fa-solid fa-cart-plus"></i>
                    </a>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          <?php if ($CountProduit > 9) { ?>
            <div class="pagination">
              <div class="content-pagination">
                <a href="#left">
                  <i class="fa-solid fa-angles-left"></i>
                </a>
                <?php for ($i = 1; $i < 10; $i++) {
                  echo '<a href="#' . $i . '">' . $i . '</a>';
                } ?>
                <a href="#right">
                  <i class="fa-solid fa-angles-right"></i>
                </a>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>

  </div>
</section>