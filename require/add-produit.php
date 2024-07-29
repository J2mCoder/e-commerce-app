<?php
#---------------------------------------------------------------------------------------------------
require("require/connect_db.php");
#---------------------------------------------------------------------------------------------------
$req_taille = $connect_db->query("SELECT * FROM taille");
#---------------------------------------------------------------------------------------------------
if(isset($_POST["register"])){
    if(!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["mark"]) && !empty($_POST["couleur"])
      && !empty($_POST["prix"]) && !empty($_POST["taille"])){
        
    $name = strip_tags(ucfirst($_POST["name"]));
    $description = strip_tags(ucfirst($_POST["description"]));
    $mark = strip_tags(ucfirst($_POST["mark"]));
    $couleur = strip_tags($_POST["couleur"]);
    $taille = strip_tags($_POST["taille"]);
    $prix = strip_tags($_POST["prix"]);
#-----------------------------------------------------------------------------------------        
if(is_numeric($prix)) {
#-----------------------------------------------------------------------------------------      
    $insert = $connect_db->prepare("INSERT INTO produit(produit,description,marque,couleur,prix,id_taille,date) VALUES(?,?,?,?,?,?,NOW())");
    $insert->execute([$name,$description,$mark,$couleur,$prix,$taille]);
    header('location:add-produit');
#-----------------------------------------------------------------------------------------  
        
    } else { echo "Le prix doit être en chiffre !"; }
    } else { echo "Veuillez remplir ses champs !"; }
}
#---------------------------------------------------------------------------------------------------
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontawesome-free-5.9.0-web/css/all.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Ajouter un produit</title>
    </head>

    <body>
        <h1>Ajout produit</h1>
        <form method="post">
            <p>
                <input type="text" name="name" placeholder="Nom du  produit">
            </p>
            <p>
                <textarea name="description"  placeholder="description"></textarea>
            </p>
            <p>
                <input type="text" name="mark" placeholder="Marque du  produit">
            </p>
            <p>
                <select name="couleur" style="width:185px">
                    <option>-- couleur</option>
                    <option value="1">Bleu</option>
                    <option value="2">Rouge</option>
                    <option value="3">vert</option>
                </select>
            </p>
            <p>
                <input type="number" name="prix" placeholder="Prix">
            </p>
            <p>
                <select name="taille" style="width:185px">
                    <option>-- taille</option>
                    <?php while($taille = $req_taille->fetch()){ ?>
                    <option value="<?= $taille['id_taille'] ?>"><?= $taille['taille'] ?></option>
                    <?php } ?>
                </select>
            </p>
            <p>
                <button type="submit" name="register">S'inscrire</button>
            </p>
        </form>
    </body>

    </html>