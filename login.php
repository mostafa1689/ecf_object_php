<?php
session_start();
include_once './config/config.php';
include_once './classes/auth.php';

$database = new Database();
$db = $database->getConnection();
$auth = new Auth($db);

if ($auth->isAuthenticated()) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($auth->login($username, $password)) {
        echo "Bienvenue, " . $_SESSION['username'] . ". Vous êtes connecté en tant que " . $_SESSION['role'] . ".";
        header("Location: index.php");
        exit();
    } else {
        echo "Identifiants invalides.";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5 ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> Mini projet PHP</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/boutique"> Boutique</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="/login">Se connecter</a>
              </li>
              
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Recherche</button>
            </form>
          </div>
        </div>
      </nav>
<div class="d-flex justify-content-center">
    <h1 class="display-3 text-center mt-5">Se connecter</h1>
</div>

    <div class="container">   
        <form action="login.php" method="POST" class="p-5 mx-auto w-50">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Utilisateur">
            </div>
            <div class="form-group mt-3">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="mot de passe">
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Se connecter</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>