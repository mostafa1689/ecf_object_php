<?php

include_once 'inscription.php';
class Auth {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }

    public function inscription($username, $password, $role = 'utilisateur') {
        $inscription = new Inscription($this->conn);
        return $inscription->enregistrerUtilisateur($username, $password, $role);
    }

    public function login($username, $password) {
        $query = "SELECT id, username, password, role FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $user['password'];

            if (password_verify($password, $hashedPassword)) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['utilisateur_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                return true;
            }
        }

        return false;
    }

    public function isAuthenticated() {
        return isset($_SESSION['username']);
    }

    public function isAdmin() {
        return $this->isAuthenticated() && $_SESSION['role'] === 'admin';
    }

    public function isModerator() {
        return $this->isAuthenticated() && $_SESSION['role'] === 'moderator';
    }
}

?>
