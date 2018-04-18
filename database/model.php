<?php
class DatabaseConnection {
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getApprovedGrowers() {
        return $this->db->query('SELECT * FROM approved_growers');
    }

    public function getSubmittedGrowers() {
        return $this->db->query('SELECT * FROM submitted_growers');
    }

    public function getApprovedCoffees() {
        return $this->db->query('SELECT * FROM approved_coffees');
    }

    public function getSubmittedCoffees() {
        return $this->db->query('SELECT * FROM submitted_coffees');
    }

    public function getStores() {
        return $this->db->query('SELECT * FROM Stores');
    }

    public function getCoffeeByID($ID) {
        $res = $this->db->prepare("SELECT * FROM submitted_coffees WHERE Coffee_ID = :ID");
        $res->execute(['ID' => $ID]);
        return $res->fetch();
    }

    public function getGrowerByID($ID) {
        $res = $this->db->prepare("SELECT * FROM submitted_growers WHERE Grower_ID = :ID");
        $res->execute(['ID' => $ID]);
        return $res->fetch();
    }
}