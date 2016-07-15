<?php

class CuttingConditions
{
    private $table_name = "ilptcrm_cutting_conditions";
    public $id;
    public $cutting_depth1;
    public $cutting_depth2;
    public $machine_surface_width1;
    public $machine_surface_width2;
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
    public $surface_quality1;
    public $surface_quality2;
    public $q1;
    public $q2;

    private $conn;


// constructor with $db as database connection

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // create Report
    function create()
    {

        // query to insert record
        $query = "INSERT INTO 
                " . $this->table_name . " 
                SET
                  cutting_depth1=:cutting_depth1, cutting_depth2=:cutting_depth2, 
                  machine_surface_width1=:machine_surface_width1, machine_surface_width2=:machine_surface_width2,
                  thread_pitch1=:thread_pitch1, thread_pitch2=:thread_pitch2, 
                  number_of_infeed1=:number_of_infeed1,number_of_infeed2=:number_of_infeed2,
                  cutting_length1=:cutting_length1,cutting_length2=:cutting_length2,
                  depth_of_grooving1=:depth_of_grooving1,depth_of_grooving2=:depth_of_grooving2,
                  surface_skin1=:surface_skin1,surface_skin2=:surface_skin2,
                  interrupted_cut1=:interrupted_cut1,interrupted_cut2=:interrupted_cut2,
                  coolant1=:coolant1,coolant2=:coolant2,
                  surface_quality1=:surface_quality1,surface_quality2=:surface_quality2,q1=:q1,q2=:q2";


        $stmt = $this->conn->prepare($query);

        $this->cutting_depth1 = htmlspecialchars(strip_tags($this->cutting_depth1));
        $this->cutting_depth2 = htmlspecialchars(strip_tags($this->cutting_depth2));
        $this->machine_surface_width1 = htmlspecialchars(strip_tags($this->machine_surface_width1));
        $this->machine_surface_width2 = htmlspecialchars(strip_tags($this->machine_surface_width2));
        $this->thread_pitch1 = htmlspecialchars(strip_tags($this->thread_pitch1));
        $this->thread_pitch2 = htmlspecialchars(strip_tags($this->thread_pitch2));
        $this->number_of_infeed1 = htmlspecialchars(strip_tags($this->number_of_infeed1));
        $this->number_of_infeed2 = htmlspecialchars(strip_tags($this->number_of_infeed2));
        $this->cutting_length1 = htmlspecialchars(strip_tags($this->cutting_length1));
        $this->cutting_length2 = htmlspecialchars(strip_tags($this->cutting_length2));
        $this->depth_of_grooving1 = htmlspecialchars(strip_tags($this->depth_of_grooving1));
        $this->depth_of_grooving2 = htmlspecialchars(strip_tags($this->depth_of_grooving2));
        $this->surface_skin1= htmlspecialchars(strip_tags($this->surface_skin1));
        $this->surface_skin2= htmlspecialchars(strip_tags($this->surface_skin2));
        $this->interrupted_cut1= htmlspecialchars(strip_tags($this->interrupted_cut1));
        $this->interrupted_cut2= htmlspecialchars(strip_tags($this->interrupted_cut2));
        $this->coolant1= htmlspecialchars(strip_tags($this->coolant1));
        $this->coolant2= htmlspecialchars(strip_tags($this->coolant2));
        $this->surface_quality1= htmlspecialchars(strip_tags($this->surface_quality1));
        $this->surface_quality2= htmlspecialchars(strip_tags($this->surface_quality2));
        $this->q1= htmlspecialchars(strip_tags($this->q1));
        $this->q2= htmlspecialchars(strip_tags($this->q2));

        //  Bind parameters for table tool
        $stmt->bindParam(":cutting_depth1", $this->cutting_depth1);
        $stmt->bindParam(":cutting_depth2", $this->cutting_depth2);
        $stmt->bindParam(":machine_surface_width1", $this->machine_surface_width1);
        $stmt->bindParam(":machine_surface_width2", $this->machine_surface_width2);
        $stmt->bindParam(":thread_pitch1", $this->thread_pitch1);
        $stmt->bindParam(":thread_pitch2", $this->thread_pitch2);
        $stmt->bindParam(":number_of_infeed1", $this->number_of_infeed1);
        $stmt->bindParam(":number_of_infeed2", $this->number_of_infeed2);
        $stmt->bindParam(":cutting_length1", $this->cutting_length1);
        $stmt->bindParam(":cutting_length2", $this->cutting_length2);
        $stmt->bindParam(":depth_of_grooving1", $this->depth_of_grooving1);
        $stmt->bindParam(":depth_of_grooving2", $this->depth_of_grooving2);
        $stmt->bindParam(":surface_skin1", $this->surface_skin1);
        $stmt->bindParam(":surface_skin2", $this->surface_skin2);
        $stmt->bindParam(":interrupted_cut1", $this->interrupted_cut1);
        $stmt->bindParam(":interrupted_cut2", $this->interrupted_cut2);
        $stmt->bindParam(":coolant1", $this->coolant1);
        $stmt->bindParam(":coolant2", $this->coolant2);
        $stmt->bindParam(":surface_quality1", $this->surface_quality1);
        $stmt->bindParam(":surface_quality2", $this->surface_quality2);
        $stmt->bindParam(":q1", $this->q1);
        $stmt->bindParam(":q2", $this->q2);

        // execute query
        if ($stmt->execute()) {
//            echo "Data into table ilptcrm_cutting_conditions is inserted successfully<br>";
            return true;
        } else {
//            echo "Data into table ilptcrm_cutting_conditions is not inserted successfully<br>";
            return false;
        }
    }

    function update(){

        // update query
        $query = "UPDATE ".$this->table_name." SET cutting_depth1=:cutting_depth1, cutting_depth2=:cutting_depth2,machine_surface_width1=:machine_surface_width1,
        machine_surface_width2=:machine_surface_width2, thread_pitch1=:thread_pitch1, thread_pitch2=:thread_pitch2, number_of_infeed1=:number_of_infeed1, number_of_infeed2=:number_of_infeed2,
        cutting_length1=:cutting_length1, cutting_length2=:cutting_length2, depth_of_grooving1=:depth_of_grooving1, depth_of_grooving2=:depth_of_grooving2, surface_skin1=:surface_skin1,
        surface_skin2=:surface_skin2,interrupted_cut1=:interrupted_cut1,interrupted_cut2=:interrupted_cut2,coolant1=:coolant1,coolant2=:coolant2,
                 surface_quality1=:surface_quality1,surface_quality2=:surface_quality2,q1=:q1,q2=:q2  WHERE id = :id";

        $stmt = $this->conn->prepare($query);


        $this->cutting_depth1=htmlspecialchars(strip_tags($this->cutting_depth1));
        $this->cutting_depth2=htmlspecialchars(strip_tags($this->cutting_depth2));
        $this->machine_surface_width1=htmlspecialchars(strip_tags($this->machine_surface_width1));
        $this->machine_surface_width2=htmlspecialchars(strip_tags($this->machine_surface_width2));
        $this->thread_pitch1=htmlspecialchars(strip_tags($this->thread_pitch1));
        $this->thread_pitch2=htmlspecialchars(strip_tags($this->thread_pitch2));
        $this->number_of_infeed1=htmlspecialchars(strip_tags($this->number_of_infeed1));
        $this->number_of_infeed2=htmlspecialchars(strip_tags($this->number_of_infeed2));
        $this->cutting_length1=htmlspecialchars(strip_tags($this->cutting_length1));
        $this->cutting_length2=htmlspecialchars(strip_tags($this->cutting_length2));
        $this->depth_of_grooving1=htmlspecialchars(strip_tags($this->depth_of_grooving1));
        $this->depth_of_grooving2=htmlspecialchars(strip_tags($this->depth_of_grooving2));
        $this->surface_skin1=htmlspecialchars(strip_tags($this->surface_skin1));
        $this->surface_skin2=htmlspecialchars(strip_tags($this->surface_skin2));
        $this->interrupted_cut1=htmlspecialchars(strip_tags($this->interrupted_cut1));
        $this->interrupted_cut2=htmlspecialchars(strip_tags($this->interrupted_cut2));
        $this->coolant1=htmlspecialchars(strip_tags($this->coolant1));
        $this->coolant2=htmlspecialchars(strip_tags($this->coolant2));
        $this->surface_quality1=htmlspecialchars(strip_tags($this->surface_quality1));
        $this->surface_quality2=htmlspecialchars(strip_tags($this->surface_quality2));
        $this->q1=htmlspecialchars(strip_tags($this->q1));
        $this->q2=htmlspecialchars(strip_tags($this->q2));



        $stmt->bindParam(':cutting_depth1', $this->cutting_depth1);
        $stmt->bindParam(':cutting_depth2', $this->cutting_depth2);
        $stmt->bindParam(':machine_surface_width1', $this->machine_surface_width1);
        $stmt->bindParam(':machine_surface_width2', $this->machine_surface_width2);
        $stmt->bindParam(':thread_pitch1', $this->thread_pitch1);
        $stmt->bindParam(':thread_pitch2', $this->thread_pitch2);
        $stmt->bindParam(':number_of_infeed1', $this->number_of_infeed1);
        $stmt->bindParam(':number_of_infeed2', $this->number_of_infeed2);
        $stmt->bindParam(':cutting_length1', $this->cutting_length1);
        $stmt->bindParam(':cutting_length2', $this->cutting_length2);
        $stmt->bindParam(':depth_of_grooving1', $this->depth_of_grooving1);
        $stmt->bindParam(':depth_of_grooving2', $this->depth_of_grooving2);
        $stmt->bindParam(':surface_skin1', $this->surface_skin1);
        $stmt->bindParam(':surface_skin2', $this->surface_skin2);
        $stmt->bindParam(':interrupted_cut1', $this->interrupted_cut1);
        $stmt->bindParam(':interrupted_cut2', $this->interrupted_cut2);
        $stmt->bindParam(':coolant1', $this->coolant1);
        $stmt->bindParam(':coolant2', $this->coolant2);
        $stmt->bindParam(':surface_quality1', $this->surface_quality1);
        $stmt->bindParam(':surface_quality2', $this->surface_quality2);
        $stmt->bindParam(':q1', $this->q1);
        $stmt->bindParam(':q2', $this->q2);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()){
//            echo "Data updated successfully in table cutting conditions<br>";

            return true;

        }else{
//            echo "Data not updated successfully in table cutting conditions<br>";
            return false;
        }
    }
}