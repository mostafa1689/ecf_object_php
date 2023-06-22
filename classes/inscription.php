<?php

class Inscription {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function enregistrerUtilisateur($username, $password, $role = 'utilisateur') { 
        $query = "SELECT id FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username" , $username);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return "Ce nom existe déjà";
        } else {
            $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)"; 
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":username" , $username);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindParam(":password" , $hashedPassword);
            $stmt->bindParam(":role" , $role); 
            
            if($stmt->execute()){
                return "ok";
            } else {
                return "erreur";
            }
        }
    }    
}

?>
