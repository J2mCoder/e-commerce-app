<form method="post" enctype="multipart/form-data">
  <section class="section-admin">
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
              <p><?php if (isset($ErrorMsg))
                echo $ErrorMsg; ?></p>
            </div>
            <div class="input-box">
              <label for="produit">Produit</label>
              <input type="text" name="produit" id="produit" value="<?php if (isset($_POST['produit'])) {
                echo $_POST['produit'];
              } ?>" placeholder="Entrez votre produit">
            </div>
            <div class="input-box">
              <label for="description">description</label>
              <textarea name="description" id="description" placeholder="Entrez une déscription"><?php if (isset($_POST['description'])) {
                echo trim($_POST['description']);
              } ?></textarea>
            </div>
            <div class="input-box">
              <label for="color">Couleur</label>
              <input type="text" name="color" id="color" value="<?php if (isset($_POST['color'])) {
                echo $_POST['color'];
              } ?>" placeholder="Entrez une couleur">
              <label for="">(Optionnel)</label>
              <input type="text" name="color2" id="color2" value="<?php if (isset($_POST['color2'])) {
                echo $_POST['color2'];
              } ?>" placeholder="Entrez une couleur">
              <input type="text" name="color3" id="color3" value="<?php if (isset($_POST['color3'])) {
                echo $_POST['color3'];
              } ?>" placeholder="Entrez une couleur">
              <input type="text" name="color4" id="color4" value="<?php if (isset($_POST['color4'])) {
                echo $_POST['color4'];
              } ?>" placeholder="Entrez une couleur">
              <input type="text" name="color5" id="color5" value="<?php if (isset($_POST['color5'])) {
                echo $_POST['color5'];
              } ?>" placeholder="Entrez une couleur">
            </div>
            <div class=" input-box">
              <label for="marque">Marque</label>
              <select name="marque" id="marque">
                <option value="">-- Marque</option>
                <?php while ($marque = $select_marque->fetch()) { ?>
                  <option value="<?= $marque["id_marque"] ?>" selected="<?php if (isset($_POST['marque']) && $_POST['marque'] == $marque['id_marque']) {
                      echo "selected";
                    } ?>">
                    <?= $marque["name"] ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class=" input-box">
              <label for="status">status</label>
              <select name="status" id="status">
                <option value="">-- status</option>
                <option value="1" selected="<?php if (
                  isset(
                  $_POST["status"]
                ) && $_POST["status"] == 1
                )
                  echo "selected" ?>">En stock</option>
                  <option value="2" selected="<?php if (
                  isset(
                  $_POST["status"]
                ) && $_POST["status"] == 2
                )
                  echo "selected" ?>">En solde</option>
                </select>
              </div>
              <div class="input-box">
                <label for="prix">Prix</label>
                <input type="text" name="prix" id="prix" value="<?php if (isset($_POST['prix'])) {
                  echo $_POST['prix'];
                } ?>" placeholder="Entrez le prix">
            </div>
            <div class="btn-box">
              <button type="submit" name="subimit-produit">Ajouter</button>
            </div>
          </div>
        </div>
      </div>
  </section>
</form>