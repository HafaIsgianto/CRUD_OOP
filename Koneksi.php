<?php
class Koneksi {
    private $conn;
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "db_0063_php";

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getUsers() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser($data) {

        $stmt = $this->conn->prepare("INSERT INTO users (name, phone, address) VALUES (:name, :phone, :address)");
        $stmt->execute($data);
    }

    public function getUserById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $data) {
        try {

            $sql = "UPDATE users SET name = :name, phone = :phone, address = :address WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $data['id'] = $id; 
            return $stmt->execute($data); 
        } catch(PDOException $e) {
            error_log("Koneksi error: " . $e->getMessage());
            return false; 
        }
    }

    public function deleteUser($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
