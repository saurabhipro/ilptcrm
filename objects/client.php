<?php
class Client{
     
    // database connection and table client
    private $conn;
    private $table_client = "ilptcrm_client";
     
    // object properties
    public $id;
    public $client_name;
    public $location;
    public $address;
    public $phone_no;
     
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }


    // create product
function create(){
     
    // query to insert record
    $query = "INSERT INTO 
                " . $this->table_client . "
            SET 
                client_name=:client_name, location=:location, address=:address, phone_no=:phone_no";
     
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // posted values
    $this->client_name=htmlspecialchars(strip_tags($this->client_name));
    $this->location=htmlspecialchars(strip_tags($this->location));
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->phone_no_=htmlspecialchars(strip_tags($this->phone_no));
 
    // bind values
    $stmt->bindParam(":client_name", $this->client_name);
    $stmt->bindParam(":location", $this->location);
    $stmt->bindParam(":address", $this->address);
    $stmt->bindParam(":phone_no", $this->phone_no);
     
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
  }

  // read products
    function readAll(){
        // select all query
        $query = "SELECT  id, client_name, address, location, phone_no FROM " . $this->table_client . "  ORDER BY id DESC";
        $stmt = $this->conn->prepare( $query );         
        $stmt->execute();         
        return $stmt;
    }

    // used when filling up the update product form
    function readOne(){
         
        // query to read single record
        $query = "SELECT client_name, address, location, phone_no FROM " . $this->table_client . "  WHERE  id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->client_name = $row['client_name'];
        $this->address  = $row['address'];
        $this->location = $row['location'];
        $this->phone_no = $row['phone_no'];
    }

    // update the product
    function update(){
     
        // update query
        $query = "UPDATE " . $this->table_client . " SET client_name = :client_name, location = :location, address = :address, phone_no = :phone_no 
                WHERE id = :id";     
        $stmt = $this->conn->prepare($query);
        $this->client_name=htmlspecialchars(strip_tags($this->client_name));
        $this->location=htmlspecialchars(strip_tags($this->location));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->phone_no=htmlspecialchars(strip_tags($this->phone_no));

        $stmt->bindParam(':client_name', $this->client_name);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':phone_no', $this->phone_no);
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


    function delete(){
        $query = "DELETE FROM " . $this->table_client . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
}
}