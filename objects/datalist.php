<?php
class Datalist{
     
    // database connection and table client
    private $conn;
    private $table_client = "ilptcrm_datalists";
     

    public $id;
    public $parameter_name;
    public $parameter_value;
    public $parameter_unit;

     
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
                parameter_name=:parameter_name, parameter_value=:parameter_value, parameter_unit=:parameter_value";
     
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // posted values
    $this->parameter_name=htmlspecialchars(strip_tags($this->parameter_name));
    $this->parameter_value=htmlspecialchars(strip_tags($this->parameter_value));
    $this->parameter_unit=htmlspecialchars(strip_tags($this->parameter_unit));

 
    // bind values
    $stmt->bindParam(":parameter_name", $this->parameter_name);
    $stmt->bindParam(":parameter_value", $this->parameter_value);
    $stmt->bindParam(":parameter_unit", $this->parameter_unit);

     
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
        $query = " SELECT  id, parameter_name, parameter_value, parameter_unit FROM " . $this->table_client . "  ORDER BY id DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();         
        return $stmt;
    }

    // used when filling up the update product form
    function readOne(){

        // query to read single record
        $query = "SELECT parameter_name, parameter_value , parameter_unit FROM " . $this->table_client . "  WHERE  id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->parameter_name= $row['parameter_name'];
        $this->parameter_value= $row['parameter_value'];
        $this->parameter_unit = $row['parameter_unit'];

    }

    // update the product
    function update(){

        // update query
        $query = "UPDATE " . $this->table_client . " SET parameter_name = :parameter_name, parameter_value = :parameter_value, 
        parameter_unit = :parameter_unit  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $this->parameter_name=htmlspecialchars(strip_tags($this->parameter_name));
        $this->parameter_value = htmlspecialchars(strip_tags($this->parameter_value));
        $this->parameter_unit=htmlspecialchars(strip_tags($this->parameter_unit));

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


        function getJSON(){
            // select all query
            $query = " SELECT  id, parameter_name, parameter_value, parameter_unit FROM " . $this->table_client . "  ORDER BY id DESC";
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            return json_encode($stmt);
        }

    }
}