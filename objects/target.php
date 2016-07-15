<?php
class Target{
     
    // database connection and table name
    private $conn;
    private $table_name = "ilptcrm_target";
     
    // object properties
    public $id;
    public $client;
    public $year;
    public $month;
    public $target;
     
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }


    // create sale
function create(){
     
    // query to insert record
    $query = "INSERT INTO 
                " . $this->table_name . "
            SET 
                client = :client, year=:year, month=:month, target=:target";
     
    // prepare query
    $stmt = $this->conn->prepare($query);
//    echo"$this->client";

    // posted target
    $this->client=htmlspecialchars(strip_tags($this->client));
    $this->year=htmlspecialchars(strip_tags($this->year));
    $this->month=htmlspecialchars(strip_tags($this->month));
    $this->target=htmlspecialchars(strip_tags($this->target));
 
    // bind target
    $stmt->bindParam(":client", $this->client);
    $stmt->bindParam(":year", $this->year);
    $stmt->bindParam(":month", $this->month);
    $stmt->bindParam(":target", $this->target);
    echo"$this->client";
    echo"$this->year";
    echo"$this->month";
    echo"$this->target";
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
        $query = "SELECT  id, client, year, month, target FROM " . $this->table_name . "  ORDER BY id DESC";
        $stmt = $this->conn->prepare( $query );         
        $stmt->execute();         
        return $stmt;
    }

    // used when filling up the update product form
    function readOne(){
         
        // query to read single record
        $query = "SELECT client, year, month,target FROM " . $this->table_name . "  WHERE  id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->client = $row['client'];
        $this->year = $row['year'];
        $this->month = $row['month'];
        $this->target = $row['target'];
    }

    // update the product
    function update(){
        
        // update query
        $query = "UPDATE " . $this->table_name . " SET  client = :client, year = :year, month = :month, target = :target 
                WHERE id = :id";     
        $stmt = $this->conn->prepare($query);
        $this->client=htmlspecialchars(strip_tags($this->client));
        $this->year=htmlspecialchars(strip_tags($this->year));
        $this->month=htmlspecialchars(strip_tags($this->month));
        $this->target=htmlspecialchars(strip_tags($this->target));
        $stmt->bindParam(':client', $this->client);
        $stmt->bindParam(':year', $this->year);
        $stmt->bindParam(':month', $this->month);
        $stmt->bindParam(':target', $this->target);
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


    function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
}
}