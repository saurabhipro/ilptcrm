<?php

class Comparision
{
    private $conn;
    private $table_name = "tab";
    public $id;
    public $cutting_speed1;
    public $cutting_speed2;
    public $revolution_rpm1;
    public $revolution_rpm2;
    public $feed_rev1;
    public $feed_rev2;
    public $feed_tooth1;
    public $feed_tooth2;
    public $cutting_teeth1;
    public $cutting_teeth2;
    public $machined_surface_width1;
    public $machined_surface_width2;
    public $thread_pitch1;
    public $thread_pitch2;
    public $number_of_infeed1;
    public $number_of_infeed2;
    public $cutting_length1;
    public $cutting_length2;
    public $depth_of_grooving1;
    public $depth_of_grooving2;
    public $surface_skin1;
    public $surface_skin2;
    public $interrupted_cut1;
    public $interrupted_cut2;
    public $coolant1;
    public $coolant2;
    public $vol_of_mat_cut1;
    public $vol_of_mat_cut2;


    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }


    // create product
    function create()
    {

        // query to insert record
        $query = "INSERT INTO 
                " . $this->table_name . "
            SET 
                name=:name, lotion=:lotion, addres=:addres, target=:target";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // posted values
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->lotion = htmlspecialchars(strip_tags($this->lotion));
        //$this->location=htmlspecialchars(strip_tags($this->location));
        $this->addres = htmlspecialchars(strip_tags($this->addres));
        $this->target = htmlspecialchars(strip_tags($this->target));
        //$this->created=htmlspecialchars(strip_tags($this->created));

        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":lotion", $this->lotion);
        //$stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":addres", $this->addres);
        $stmt->bindParam(":target", $this->target);
        //$stmt->bindParam(":created", $this->created);

        // execute query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // read products
    function readAll()
    {
        // select all query
        $query = "SELECT  id, name, lotion, addres, target FROM " . $this->table_name . "  ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // used when filling up the update product form
    function readOne()
    {

        // query to read single record
        $query = "SELECT name, lotion,addres ,target FROM " . $this->table_name . "  WHERE  id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $row['name'];
        $this->lotion = $row['lotion'];
        // $this->location = $row['location'];
        $this->addres = $row['addres'];
        $this->target = $row['target'];

    }

    // update the product
    function update()
    {

        // update query
        $query = "UPDATE " . $this->table_name . " SET name = :name, lotion = :lotion, addres = :addres, target = :target 
                WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->lotion = htmlspecialchars(strip_tags($this->lotion));
        //$this->location=htmlspecialchars(strip_tags($this->location));
        $this->addresaddres = htmlspecialchars(strip_tags($this->addres));
        $this->target = htmlspecialchars(strip_tags($this->target));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':lotion', $this->lotion);
        //$stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':addres', $this->addres);
        $stmt->bindParam(':target', $this->target);

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
}
