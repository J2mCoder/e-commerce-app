<?php
require ("db/connect_db.php");

$select = $connect_db->query("SELECT * FROM produit WHERE status=2 ORDER BY id_produit DESC");
$COUNT_SOLDE = $select->rowCount();