<?php session_start();

class User
{

    // database connection and table name
    public $id;
    public $username;
    // object properties
    public $login_id;
    public $password;
    public $role;
    public $rights;
    private $conn;
    private $table_name = "ilptcrm_user";

    // constructor with $db as database connection

    public function __construct($db)
    {
        $this->conn = $db;
    }


    // create user
    function create()
    {


        // query to insert record
        $query = "INSERT INTO 
                " . $this->table_name . "
            SET 
                username =:username, login_id =:login_id, password =:password, role =:role, rights =:rights";
        $stmt = $this->conn->prepare($query);
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->login_id = htmlspecialchars(strip_tags($this->login_id));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->rights = htmlspecialchars(strip_tags($this->rights));

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":login_id", $this->login_id);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":role", $this->role);
        $stmt->bindParam(":rights", $this->rights);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // read users
    function readAll()
    {
        // select all query
        $query = "SELECT  id, username, login_id, password, role, rights  FROM " . $this->table_name . "  ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // used when filling up the update user form
    function readOne()
    {

        // query to read single record
        $query = "SELECT username, login_id, password, role, rights FROM " . $this->table_name . "  WHERE  id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->username = $row['username'];
        $this->login_id = $row['login_id'];
        $this->password = $row['password'];
        $this->role = $row['role'];
        $this->rights = $row['rights'];

    }

    // update the user
    function update()
    {

        // update query
        $query = "UPDATE " . $this->table_name . " SET username = :username, login_id = :login_id, password = :password, role = :role, rights = :rights
                WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->login_id = htmlspecialchars(strip_tags($this->login_id));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->rights = htmlspecialchars(strip_tags($this->rights));
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':login_id', $this->login_id);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':rights', $this->rights);
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function authenticateUser()
    {

        $query = " SELECT username,password,role  FROM " . $this->table_name . " WHERE  username=:username and  password=:password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        //$stmt->bindParam(':role', $this->role);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (count($result === 1)) {
            $_SESSION['username'] = $result['username'];
            $_SESSION['role'] = $result['role'];
            return true;
        } else {
            return false;
        }


    }
}