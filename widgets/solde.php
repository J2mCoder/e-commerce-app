<?php
require ("require/Solde.php");
?>
<?php if ($COUNT_SOLDE > 0) { ?>
  <section class="section-solde" id="Promotion">
    <div class="container">
      <div class="solde-content-title">
        <h1>Promotions</h1>
        <p>Réductions jusqu'à 25%</p>
        <div class="underline"></div>
      </div>
      <div class="solde-content-body">
        <div class="grid">
          <?php while ($SOLDE = $select->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="card">
              <div class="card-body">
                <div class="solde-banner">
                  <p>-25%</p>
                </div>
                <img src="<?php $SOLDE["produit"]; ?>" alt="" />
              </div>
              <div class="card-footer">
                <div class="content-info">
                  <h3>
                    <?= $SOLDE["produit"]; ?>
                  </h3>
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
                  <p class="price"><?= $SOLDE["prix"] . "$"; ?><span style="color:red; margin:0 8px">-25%</span></p>
                  <a href="index.php?page=home&action=add-to-panier&id=<?= $SOLDE["url"] ?>" title="Ajouter au panier"
                    class="store">
                    <i class="fa-solid fa-cart-plus"></i>
                  </a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
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
    </div>
  </section>
<?php } ?>