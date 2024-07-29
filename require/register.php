<?php
require("db/connect_db.php");
$ErrorMsg = null;

if (isset($_SESSION["USER"])) {
  header("Location: index.php?page=home");
  exit();
}


if (isset($_POST["submit-register"])) {
  if (!empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["email"]) && !empty($_POST["sexe"]) && !empty($_POST["password"]) && !empty($_POST["confirm-password"]) && !empty($_POST["age"]) && !empty($_POST["adresse"])) {
      
    $lastname = strip_tags(htmlspecialchars(ucfirst(strtolower($_POST["lastname"]))));
    $firstname =strip_tags(htmlspecialchars(ucfirst(strtolower($_POST["firstname"]))));
    $adresse = strip_tags(htmlspecialchars($_POST["adresse"]));
    $sexe = strip_tags(htmlspecialchars($_POST["sexe"]));
    $age = strip_tags(htmlspecialchars($_POST["age"]));
    $email = strip_tags(htmlspecialchars(strtolower($_POST["email"])));
    $password = strip_tags(htmlspecialchars($_POST["password"]));
    $confirm_password = strip_tags(htmlspecialchars($_POST["confirm-password"]));

    if (strlen($lastname) > 2) {
      if(strlen($firstname) > 2) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          if ($sexe == 1 || $sexe == 2) {
            if (is_numeric($age) && $age >= 18) {
              if (strlen($adresse) > 5) {
                if (strlen($password) >= 8) {
                  if ($password == $confirm_password) {

                    $password = password_hash($password, PASSWORD_DEFAULT);
                    
                    $req = $connect_db->prepare("SELECT * FROM client WHERE email =?");
                    $req->execute([$email]);
                    $userExist = $req->rowCount();
                    if ($userExist == 0) {
                      
                      $token = md5(uniqid(rand()));
                      $insert = $connect_db->prepare("INSERT INTO client(nom,prenom,email,adress,age,sexe,url,password,date) VALUES(?,?,?,?,?,?,?,?,now())");
                      $insert->execute([$lastname,$firstname,$email,$adresse,$age,$sexe,$token,$password]);

                      $_SESSION["USER"] = $token;
                      header("Location:index.php?page=home");
                      exit();
                    } else { $ErrorMsg = "Cet email est déjà utilisé!"; }
                  } else { $ErrorMsg = "Les mots de passe ne sont pas identiques!"; }
                } else { $ErrorMsg = "Le mot de passe doit contenir au moins 8 caractères!"; }
              } else { $ErrorMsg = "L'adresse doit contenir au moins 5 caractères!"; }
            } else { $ErrorMsg = "Vous devez avoir au moins 18 ans !"; }
          } else { $ErrorMsg = "Veuillez choisir votre Sexe !"; }
        } else { $ErrorMsg = "L'adresse email est invalide!"; }
      } else { $ErrorMsg = "Le prenom doit avoir au moins 3 caractères!"; }
    } else { $ErrorMsg = "Le nom doit avoir au moins 3 caractères!"; }
  } else { $ErrorMsg = "Veuillez remplir tous les champs !"; }
}