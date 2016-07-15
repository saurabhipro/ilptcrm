<?php
class Sale{
     
    // database connection and table name
    private $conn;
    private $table_name = "ilptcrm_booksales";
     
    // object properties
    public $id;
    public $client;
    public $year;
    public $month;
    public $value_s;

    public $fromDate;
    public $toDate;
     
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
                client = :client, year=:year, month=:month, value_s=:value_s";
     
    // prepare query
    $stmt = $this->conn->prepare($query);
    $this->client=htmlspecialchars(strip_tags($this->client));
    $this->year=htmlspecialchars(strip_tags($this->year));
    $this->month=htmlspecialchars(strip_tags($this->month));
    $this->value_s=htmlspecialchars(strip_tags($this->value_s));
 
    // bind value_s
    $stmt->bindParam(":client", $this->client);
    $stmt->bindParam(":year", $this->year);
    $stmt->bindParam(":month", $this->month);
    $stmt->bindParam(":value_s", $this->value_s);

    // execute query
    if($stmt->execute()){

        return true;
    }else{


        return false;
    }
  }

  // read products
    function readAll($a){
        // select all query
        $query = "SELECT  id, client, year, month, value_s FROM " . $this->table_name . "  ORDER BY id DESC";
        $stmt = $this->conn->prepare( $query );         
        $stmt->execute();         
        return $stmt;
    }

    // used when filling up the update product form
    function readOne(){
         
        // query to read single record
        $query = "SELECT client, year, month,value_s FROM " . $this->table_name . "  WHERE  id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->client = $row['client'];
        $this->year = $row['year'];
        $this->month = $row['month'];
        $this->value_s = $row['value_s'];
    }

    // update the product
    function update(){
        
        // update query
        $query = "UPDATE " . $this->table_name . " SET  client = :client, year = :year, month = :month, value_s = :value_s 
                WHERE id = :id";     
        $stmt = $this->conn->prepare($query);
        $this->client=htmlspecialchars(strip_tags($this->client));
        $this->year=htmlspecialchars(strip_tags($this->year));
        $this->month=htmlspecialchars(strip_tags($this->month));
        $this->value_s=htmlspecialchars(strip_tags($this->value_s));
        $stmt->bindParam(':client', $this->client);
        $stmt->bindParam(':year', $this->year);
        $stmt->bindParam(':month', $this->month);
        $stmt->bindParam(':value_s', $this->value_s);
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