<?php
class Create {
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function CreateData($username , $email) {
        $query = "INSERT INTO  users ( username , email) VALUES (:username , :email)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":username" , $username);
        $stmt->bindParam(":email" , $email);
        if($stmt-> execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>