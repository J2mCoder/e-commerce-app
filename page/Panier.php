<?php
require("db/connect_db.php");
$ErrorMsg = null;
$total = 0;
if (!isset($_SESSION['panier'])) {
  $ErrorMsg = "Le panier est vide";
}
?>
<section class="section-panier">
  <div class="container">
    <div class="content">
      <div class="produits">
        <div class="title">
          <h1>Panier</h1>
          <div class="underline"></div>
        </div>
        <div class="table">
          <table>
            <thead>
              <tr>
                <th>N°</th>
                <th>Image</th>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
                foreach ($_SESSION['panier'] as $id => $quantity) {
                  $result = $connect_db->query("SELECT * FROM produit WHERE url='$id'");
                  if ($result) {
                    $row = $result->fetch();
                    if ($row) {
                      $subtotal = $row['prix'] * $quantity;
                      $total += $subtotal; 
              ?>
              <tr>
                <td><?php echo $i+1;?></td>
                <td>
                  <img src="<?php echo $row['image']; ?>" height="50" width="50" alt="">
                </td>
                <td>Produit <?php echo $row['produit']; ?></td>
                <td><?php echo $row['prix'] . '$'; ?></td>
                <td>
                  <input type="number" min="1" max="3" value="<?php echo $quantity; ?>">
                </td>
                <td><?php echo $subtotal . '$'; ?></td>
                <td>
                  <a href="#" title="Supprimer" class="delete">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
              <?php
                    } else {
                      $ErrorMsg = "Produit non trouvé pour l'ID $id";
                    }
                  } else {
                    $ErrorMsg = "Erreur lors de la requête pour l'ID $id";
                  }
                  $i++;
                }
              } else {
                $ErrorMsg = "Le panier est vide";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="payement">
        <div class="title">
          <h1>Payement</h1>
          <div class="underline"></div>
        </div>
        <div class="content">
          <div class="total">
            <p>Total : <span><?php echo $total . " $"; ?></span></p>
          </div>
          <div class="btn-box">
            <button type="button">Commander</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php if ($ErrorMsg) { echo "<p>Error: $ErrorMsg</p>"; } ?>