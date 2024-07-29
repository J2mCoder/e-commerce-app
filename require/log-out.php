<?php

session_start();

$_SESSION = array();
session_destroy();

setcookie("USER", "", time() - 3600, "/");

header("location:index.php?page=home");
exit;