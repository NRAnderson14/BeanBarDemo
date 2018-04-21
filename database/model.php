<?php

class DatabaseConnection
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getApprovedGrowers()
    {
        return $this->db->query('SELECT * FROM approved_growers');
    }

    public function getSubmittedGrowers()
    {
        return $this->db->query('SELECT * FROM submitted_growers');
    }

    public function getApprovedCoffees()
    {
        return $this->db->query('SELECT * FROM approved_coffees');
    }

    public function getSubmittedCoffees()
    {
        return $this->db->query('SELECT * FROM submitted_coffees');
    }

    public function getCoffeesByStoreID($StoreID)
    {
        $res = $this->db->prepare(
            'select * from coffees co, carries ca, stores s WHERE co.Coffee_ID = ca.Coffee_ID ' .
            'AND s.Store_ID = ca.Store_ID AND s.Store_ID = :ID; ');
        $res->execute(['ID' => $StoreID]);
        return $res->fetchAll();
    }

    public function getStores()
    {
        return $this->db->query('SELECT * FROM Stores');
    }

    public function getStoreByID($ID)
    {
        $res = $this->db->prepare("SELECT * from stores WHERE Store_ID = :ID");
        $res->execute(['ID' => $ID]);
        return $res->fetch();
    }

    public function getCoffeeByID($ID)
    {
        $res = $this->db->prepare("SELECT * FROM submitted_coffees WHERE Coffee_ID = :ID");
        $res->execute(['ID' => $ID]);
        if ($res->rowCount() == 0) {
            return false;
        } else {
            return $res->fetch();
        }
    }

    public function getGrowerByID($ID)
    {
        $res = $this->db->prepare("SELECT * FROM submitted_growers WHERE Grower_ID = :ID");
        $res->execute(['ID' => $ID]);
        return $res->fetch();
    }

    public function submitNewGrower($firstName, $lastName, $location, $farmName, $shortDesc, $longDesc, $approved)
    {
        $res = $this->db->prepare(
            "INSERT INTO Growers (First_Name, Last_Name, Location, Farm_Name, Short_Desc, Long_Desc) VALUES " .
            "(:firstName, :lastName, :location, :farmName, :shortDesc, :longDesc, :approved)");
        $res->execute(['firstName' => $firstName, 'lastName' => $lastName, 'location' => $location, 'farmName' => $farmName,
            'shortDesc' => $shortDesc, 'longDesc' => $longDesc, 'approved' => $approved]);
    }

    public function approveGrower($ID)
    {
        $res = $this->db->prepare("UPDATE Growers SET Approved = 1 WHERE Grower_ID = :ID");
        $res->execute(['ID' => $ID]);
    }

}