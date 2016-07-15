<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);


class Evaluation
{

    private $conn;
    private $table_name = "ilptcrm_evaluation";
    public $id;
    public $durability_of_edge1="";
    public $durability_of_edge2="";
    public $durability_pcs1="";
    public $durability_pcs2="";
    public $flank_wear1="";
    public $flank_wear2="";
    public $insert_fracture_fragile1="";
    public $insert_fracture_fragile2="";
    public $built_up_edge1="";
    public $built_up_edge2="";
    public $nose_tip_plastic_deformation1="";
    public $nose_tip_plastic_deformation2="";
    public $kind_of_chip1="";
    public $kind_of_chip2="";
    public $rigidity_of_system1="";
    public $rigidity_of_system2="";
    public $successful_stories="";
    public $attachment=[];
    private $attachment_tmp = "";
    private $attachment_name = "";
    private $attachment_type = "";
    private $attachment_size = ""; // now go tot create function
    public $technical_evaluation="";
    public $included_test_to_the_general_evaluation="";
    public $notes="";

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // create product
    function create()
    {
     //   print_r($this->attachment);

        $this->attachment_tmp = $this->attachment['tmp_name'];
        $this->attachment_name = $this->attachment['name'];
        $this->attachment_size = $this->attachment['size'];
        $this->attachment_type = $this->attachment['type'];

        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . " SET durability_of_edge1=:durability_of_edge1, durability_of_edge2=:durability_of_edge2, durability_pcs1=:durability_pcs1,durability_pcs2=:durability_pcs2, flank_wear1=:flank_wear1,flank_wear2=:flank_wear2,
                insert_fracture_fragile1=:insert_fracture_fragile1,insert_fracture_fragile2=:insert_fracture_fragile1, built_up_edge1=:built_up_edge1, built_up_edge2=:built_up_edge2, nose_tip_plastic_deformation1=:nose_tip_plastic_deformation1,
                nose_tip_plastic_deformation2=:nose_tip_plastic_deformation2, kind_of_chip1=:kind_of_chip1,kind_of_chip2=:kind_of_chip2, rigidity_of_system1=:rigidity_of_system1,rigidity_of_system2=:rigidity_of_system2, successful_stories = :successful_stories, attachment=:attachment,
                technical_evaluation=:technical_evaluation,included_test_to_the_general_evaluation=:included_test_to_the_general_evaluation,notes=:notes";


        $this->durability_of_edge1= htmlspecialchars(strip_tags($this->durability_of_edge1));
        $this->durability_of_edge2= htmlspecialchars(strip_tags($this->durability_of_edge2));
        $this->durability_pcs1= htmlspecialchars(strip_tags($this->durability_pcs1));
        $this->durability_pcs2= htmlspecialchars(strip_tags($this->durability_pcs2));
        $this->flank_wear1= htmlspecialchars(strip_tags($this->flank_wear1));
        $this->flank_wear2= htmlspecialchars(strip_tags($this->flank_wear2));
        $this->insert_fracture_fragile1= htmlspecialchars(strip_tags($this->insert_fracture_fragile1));
        $this->insert_fracture_fragile2= htmlspecialchars(strip_tags($this->insert_fracture_fragile2));
        $this->built_up_edge1= htmlspecialchars(strip_tags($this->built_up_edge1));
        $this->built_up_edge2= htmlspecialchars(strip_tags($this->built_up_edge2));
        $this->nose_tip_plastic_deformation1= htmlspecialchars(strip_tags($this->nose_tip_plastic_deformation1));
        $this->nose_tip_plastic_deformation2= htmlspecialchars(strip_tags($this->nose_tip_plastic_deformation2));
        $this->kind_of_chip1= htmlspecialchars(strip_tags($this->kind_of_chip1));
        $this->kind_of_chip2= htmlspecialchars(strip_tags($this->kind_of_chip2));
        $this->rigidity_of_system1= htmlspecialchars(strip_tags($this->rigidity_of_system1));
        $this->rigidity_of_system2= htmlspecialchars(strip_tags($this->rigidity_of_system2));
        $this->successful_stories= htmlspecialchars(strip_tags($this->successful_stories));
        $this->attachment_name= htmlspecialchars(strip_tags($this->attachment_name));
        $this->technical_evaluation= htmlspecialchars(strip_tags($this->technical_evaluation));
        $this->included_test_to_the_general_evaluation= htmlspecialchars(strip_tags($this->included_test_to_the_general_evaluation));
        $this->notes= htmlspecialchars(strip_tags($this->notes));

        //refresh now
        //if (move_uploaded_file($this->attachment_tmp, '../uploads/'.$this->attachment_name)) :
        if(1 == 1 ) :
            try {
                // prepare query
                $stmt = $this->conn->prepare($query);
                // bind values
                $stmt->bindParam(":durability_of_edge1" , $this->durability_of_edge1);
                $stmt->bindParam(":durability_of_edge2" , $this->durability_of_edge2);
                $stmt->bindParam(":durability_pcs1" , $this->durability_pcs1);
                $stmt->bindParam(":durability_pcs2" , $this->durability_pcs2);
                $stmt->bindParam(":flank_wear1" , $this->flank_wear1);
                $stmt->bindParam(":flank_wear2", $this->flank_wear2);
                $stmt->bindParam(":insert_fracture_fragile1" , $this->insert_fracture_fragile1);
                $stmt->bindParam(":insert_fracture_fragile2" , $this->insert_fracture_fragile2);
                $stmt->bindParam(":built_up_edge1" , $this->built_up_edge1);
                $stmt->bindParam(":built_up_edge2" , $this->built_up_edge2);
                $stmt->bindParam(":nose_tip_plastic_deformation1" , $this->nose_tip_plastic_deformation1);
                $stmt->bindParam(":nose_tip_plastic_deformation2" , $this->nose_tip_plastic_deformation2);
                $stmt->bindParam(":kind_of_chip1" , $this->kind_of_chip1);
                $stmt->bindParam(":kind_of_chip2" , $this->kind_of_chip2);
                $stmt->bindParam(":rigidity_of_system1" , $this->rigidity_of_system1);
                $stmt->bindParam(":rigidity_of_system2" , $this->rigidity_of_system2);
                $stmt->bindParam(":successful_stories" , $this->successful_stories);
                $stmt->bindParam(":attachment" , $this->attachment_name); // now refresh
                $stmt->bindParam(":technical_evaluation" , $this->technical_evaluation);
                $stmt->bindParam(":included_test_to_the_general_evaluation" , $this->included_test_to_the_general_evaluation);
                $stmt->bindParam(":notes" , $this->notes);

                $stmt->execute();
                echo "Data inserted in evaluation..<br>";
                return true;

            } catch(PDOException $e) {
                 echo $e->getMessage();

                // display a user friendly message
                echo "Data not inserted in evaluation..<br>" ;

                // and then delete the file which is uploaded
              //  unlink("../uploads/".$attachment['attachment']['name']);
                return false;
            }
        else :
            $_SESSION['notice'] = "Please try again later.";
        endif;

    }

    // read products
    function readAll()
    {
        // select all query
        $query = "SELECT  id, client_name, address, location, phone_no FROM " . $this->table_name . "  ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // used when filling up the update product form
    function readOne()
    {

        // query to read single record
        $query = "SELECT client_name, address, location, phone_no FROM " . $this->table_name . "  WHERE  id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->client_name = $row['client_name'];
        $this->address = $row['address'];
        $this->location = $row['location'];
        $this->phone_no = $row['phone_no'];
    }

    // update the product

    function update(){

        // update query
        $query = "UPDATE ".$this->table_name." 
        SET 
        durability_of_edge1=:durability_of_edge1,
        durability_of_edge2=:durability_of_edge2,
        durability_pcs1=:durability_pcs1,
        durability_pcs2=:durability_pcs2,
        flank_wear1=:flank_wear1,
        flank_wear2=:flank_wear2,
        insert_fracture_fragile1=:insert_fracture_fragile1,
        insert_fracture_fragile2=:insert_fracture_fragile2,
        built_up_edge1=:built_up_edge1,
        built_up_edge2=:built_up_edge2,
        nose_tip_plastic_deformation1=:nose_tip_plastic_deformation1,
        nose_tip_plastic_deformation2=:nose_tip_plastic_deformation2,
        kind_of_chip1=:kind_of_chip1,
        kind_of_chip2=:kind_of_chip2,
        rigidity_of_system1=:rigidity_of_system1,
        rigidity_of_system2=:rigidity_of_system2,
        successful_stories=:successful_stories,
        technical_evaluation=:technical_evaluation,
        included_test_to_the_general_evaluation=:included_test_to_the_general_evaluation,
        notes=:notes
        WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $this->durability_of_edge1=htmlspecialchars(strip_tags($this->durability_of_edge1));
        $this->durability_of_edge2=htmlspecialchars(strip_tags($this->durability_of_edge2));
        $this->durability_pcs1=htmlspecialchars(strip_tags($this->durability_pcs1));
        $this->durability_pcs2=htmlspecialchars(strip_tags($this->durability_pcs2));
        $this->flank_wear1=htmlspecialchars(strip_tags($this->flank_wear1));
        $this->flank_wear2=htmlspecialchars(strip_tags($this->flank_wear2));
        $this->insert_fracture_fragile1=htmlspecialchars(strip_tags($this->insert_fracture_fragile1));
        $this->insert_fracture_fragile2=htmlspecialchars(strip_tags($this->insert_fracture_fragile2));
        $this->built_up_edge1=htmlspecialchars(strip_tags($this->built_up_edge1));
        $this->built_up_edge2=htmlspecialchars(strip_tags($this->built_up_edge2));
        $this->nose_tip_plastic_deformation1=htmlspecialchars(strip_tags($this->nose_tip_plastic_deformation1));
        $this->nose_tip_plastic_deformation2=htmlspecialchars(strip_tags($this->nose_tip_plastic_deformation2));
        $this->kind_of_chip1=htmlspecialchars(strip_tags($this->kind_of_chip1));
        $this->kind_of_chip1=htmlspecialchars(strip_tags($this->kind_of_chip1));
        $this->rigidity_of_system1=htmlspecialchars(strip_tags($this->rigidity_of_system1));
        $this->rigidity_of_system2=htmlspecialchars(strip_tags($this->rigidity_of_system2));
        $this->successful_stories=htmlspecialchars(strip_tags($this->successful_stories));
        $this->technical_evaluation=htmlspecialchars(strip_tags($this->technical_evaluation));
        $this->included_test_to_the_general_evaluation=htmlspecialchars(strip_tags($this->included_test_to_the_general_evaluation));
        $this->notes=htmlspecialchars(strip_tags($this->notes));
        $this->id=htmlspecialchars(strip_tags($this->id));


        $stmt->bindParam(':durability_of_edge1', $this->durability_of_edge1);
        $stmt->bindParam(':durability_of_edge2', $this->durability_of_edge2);
        $stmt->bindParam(':durability_pcs1', $this->durability_pcs1);
        $stmt->bindParam(':durability_pcs2', $this->durability_pcs2);
        $stmt->bindParam(':flank_wear1', $this->flank_wear1);
        $stmt->bindParam(':flank_wear2', $this->flank_wear2);
        $stmt->bindParam(':insert_fracture_fragile1', $this->insert_fracture_fragile1);
        $stmt->bindParam(':insert_fracture_fragile2', $this->insert_fracture_fragile2);
        $stmt->bindParam(':built_up_edge1', $this->built_up_edge1);
        $stmt->bindParam(':built_up_edge2', $this->built_up_edge2);
        $stmt->bindParam(':nose_tip_plastic_deformation1', $this->nose_tip_plastic_deformation1);
        $stmt->bindParam(':nose_tip_plastic_deformation2', $this->nose_tip_plastic_deformation2);
        $stmt->bindParam(':kind_of_chip1', $this->kind_of_chip1);
        $stmt->bindParam(':kind_of_chip2', $this->kind_of_chip1);
        $stmt->bindParam(':rigidity_of_system1', $this->rigidity_of_system1);
        $stmt->bindParam(':rigidity_of_system2', $this->rigidity_of_system2);
        $stmt->bindParam(':successful_stories', $this->successful_stories);
        $stmt->bindParam(':technical_evaluation', $this->technical_evaluation);
        $stmt->bindParam(':included_test_to_the_general_evaluation', $this->included_test_to_the_general_evaluation);
        $stmt->bindParam(':notes', $this->notes);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()){
             echo "Data updated successfully in table evaluation <br>";
            return true;

        }else{
             echo "Data not updated successfully in table evaluation <br>";
            return false;
        }
    }

    function delete()
    {

    }
}