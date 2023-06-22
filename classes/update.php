<?php
class Update {
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function updateData($id, $username , $role) {
        $query = "UPDATE users SET username = :username , role=:role  WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id" , $id);
        $stmt->bindParam(":username" , $username);
        $stmt->bindParam(":role" , $role);
        if($stmt-> execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>