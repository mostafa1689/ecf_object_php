<?php
session_start();
include_once './classes/auth.php';
include_once './config/config.php';
include_once './classes/create.php';
include_once './classes/read.php';
include_once './classes/update.php';
include_once './classes/delete.php';

$database = new Database();
$db = $database->getConnection();

$auth = new Auth($db);
$create = new Create($db);
$read = new Read($db);
$update = new Update($db);
$delete = new Delete($db);

if (!$auth->isAuthenticated()) {
    header("Location: login.php");
    exit();
}

if (!$auth->isModerator() && !$auth->isAdmin()) {
    header("Location: access-denied.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];

    if ($delete->deleteData($id)) {
        echo "Enregistrement supprimé.";
    } else {
        echo "Erreur lors de la suppression.";
    }
}

$stmt = $read->readData();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <a class="nav-link active" aria-current="page" href="/"> Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/boutique"> Boutique </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="/login"> Se connecter</a>
              </li>
              
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Recherche</button>
            </form>
          </div>
        </div>
      </nav>
    <div class="container mt-5">
        <h1>Liste des utilisateurs</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?> 
 
                    <tr>
                    <td> <?= $row['id']  ?></td>
                    <td> <?= $row['username']  ?></td>
                    <td> <?= $row['role']  ?></td>                  
                    <td>

                    <?php if ($auth->isModerator() || $auth->isAdmin()) { ?>
                    
                        <form action='./update.php' method='POST'>
                        <input type='hidden' name='id' value='<?= $row['id']  ?>' >
                        <input type='text' name='username' value='<?= $row['username']  ?>'>
                        <select name='role' >";
                        <option value='utilisateur'  <?=  $row['role'] === 'utilisateur' ? 'selected' : '' ?>   >Utilisateur</option>
                        <option value='admin'  <?=  $row['role'] === 'admin' ? 'selected' : '' ?>   >Admin</option>
                        <option value='moderator'  <?=  $row['role'] === 'moderator' ? 'selected' : '' ?>   >Moderateur</option>
                        </select>
                        <input type='submit' class='btn btn-primary btn-sm' value='Mettre à jour'>
                        </form>
                    <?php } ?>
                    <form action='<?php $_SERVER['PHP_SELF']?>'    method='POST'>
                    <input type='hidden' name='id' value='<?= $row['id']  ?>'>
                    <input type='submit' class='btn btn-danger btn-sm' name='delete' value='Supprimer'>
                    </form>
                    </td>
                    </tr>
                
                <?php } ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>
