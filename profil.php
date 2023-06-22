<!DOCTYPE html>
<html>
<head>
    <title>Affichage des utilisateurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Liste des utilisateurs</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Boucle pour afficher les utilisateurs
                foreach ($users as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['role'] . "</td>";
                    echo "<td>";
                    echo "<form action='./update.php' method='POST'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<input type='text' name='username' value='" . $row['username'] . "'>";
                    echo "<input type='text' name='role' value='" . $row['role'] . "'>";
                    echo "<input type='submit' class='btn btn-primary btn-sm' value='Mettre à jour'>";
                    echo "</form>";
                    echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<input type='submit' class='btn btn-danger btn-sm' name='delete' value='Supprimer'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
