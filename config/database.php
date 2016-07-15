<?php

class Database
{

    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "ilptcrm";
    private $username = "root";
    private $password = "1234";
    public $conn;
    //ALTER TABLE ilptcrm.ilptcrm_evaluation AUTO_INCREMENT = 1;
    // get the database connection
    public function getConnection()
    {
        $this->conn = null;
        // root url
        define("ROOT_URL", "http://localhost/ilptcrm_design/");

        // upload directory url
        define("UPLOAD_DIR", ROOT_URL . "uploads/");

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }


}

//For json.php, json2.php, datalist_json.php, excel download

$con = new mysqli("localhost", "root", "1234", "ilptcrm");
//$mysqli = new mysqli('localhost', 'iprosota_ilptcrm', 'XTT9AfbbQRy^','iprosota_ilptcrm');

if($con->connect_error) {
    die("Connection failed:- ".$conn->connect_error);
}
// For create_sale_form and target drop download populate
$odb=new PDO('mysql:host=localhost;dbname=ilptcrm', 'root', '1234');
$odb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



/*<?php
class Database{
     
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "iprosota_ilptcrm";
    private $username = "iprosota_ilptcrm";
    private $password = "XTT9AfbbQRy^";
    public $conn;
    //ALTER TABLE ilptcrm.ilptcrm_evaluation AUTO_INCREMENT = 1;
    // get the database connection
    public function getConnection(){
     
        $this->conn = null;
         
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>*/