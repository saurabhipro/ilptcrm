<?php

ini_set('display_errors', 'On');

class MachinedPart
{
    private $conn;
    private $table_name = "ilptcrm_machined_part";
    public $id;
    public $type;
    public $load_mp;
    public $techn_conditions;
    public $name_mp;
    public $requested_roughness;
    public $workpiece;
    public $group_mp;
    public $strength;
    public $hardness_hb;
    public $hardness_hrc;
    public $application_description;


    public function __construct($db)
    {
        $this->conn = $db;
    }


    function create()
    {
        $query = " INSERT INTO " . $this->table_name . " SET 
                type=:type,
                load_mp=:load_mp,
                techn_conditions=:techn_conditions,
                name_mp=:name_mp,
                requested_roughness=:requested_roughness,
                workpiece=:workpiece,
                group_mp=:group_mp,
                strength=:strength,
                hardness_hb=:hardness_hb";

        $stmt = $this->conn->prepare($query);
        $this->type=htmlspecialchars(strip_tags($this->type));
        $this->load_mp=htmlspecialchars(strip_tags($this->load_mp));
        $this->techn_conditions=htmlspecialchars(strip_tags($this->techn_conditions));
        $this->name_mp=htmlspecialchars(strip_tags($this->name_mp));
        $this->requested_roughness=htmlspecialchars(strip_tags($this->requested_roughness));
        $this->workpiece=htmlspecialchars(strip_tags($this->workpiece));
        $this->group_mp=htmlspecialchars(strip_tags($this->group_mp));
        $this->strength=htmlspecialchars(strip_tags($this->strength));
        $this->hardness_hb=htmlspecialchars(strip_tags($this->hardness_hb));
        //this->hardness_hrc=htmlspecialchars(strip_tags($this->hardness_hrc));
        // $this->application_description=htmlspecialchars(strip_tags($this->application_description));

        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":load_mp", $this->load_mp);
        $stmt->bindParam(":techn_conditions", $this->techn_conditions);
        $stmt->bindParam(":name_mp", $this->name_mp);
        $stmt->bindParam(":requested_roughness", $this->requested_roughness);
        $stmt->bindParam(":workpiece", $this->workpiece);
        $stmt->bindParam(":group_mp", $this->group_mp);
        $stmt->bindParam(":strength", $this->strength);
        $stmt->bindParam(":hardness_hb", $this->hardness_hb);
        // $stmt->bindParam(":hardness_hrc", $this->hardness_hrc);
        // $stmt->bindParam(":application_description", $this->application_description);

        if($stmt->execute())
        {
            echo "Date inserted in ilptcrm_machined_part inserted .." . "<br>";
            return true;
        }else{
            echo "Date not inserted in ilptcrm_machined_part inserted .." . "<br>";
            return false;
        }
    }

    function update(){

        // update query
        $query = "UPDATE ".$this->table_name." SET type=:type, load_mp=:load_mp,techn_conditions=:techn_conditions,
        name_mp=:name_mp, requested_roughness=:requested_roughness, workpiece=:workpiece, group_mp=:group_mp, strength=:strength,
        hardness_hb=:hardness_hb,hardness_hrc=:hardness_hrc   WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $this->type=htmlspecialchars(strip_tags($this->type));
        $this->load_mp=htmlspecialchars(strip_tags($this->load_mp));
        $this->techn_conditions=htmlspecialchars(strip_tags($this->techn_conditions));
        $this->name_mp=htmlspecialchars(strip_tags($this->name_mp));
        $this->requested_roughness=htmlspecialchars(strip_tags($this->requested_roughness));
        $this->workpiece=htmlspecialchars(strip_tags($this->workpiece));
        $this->group_mp=htmlspecialchars(strip_tags($this->group_mp));
        $this->strength=htmlspecialchars(strip_tags($this->strength));
        $this->hardness_hb=htmlspecialchars(strip_tags($this->hardness_hb));
        $this->hardness_hrc=htmlspecialchars(strip_tags($this->hardness_hrc));


        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':load_mp', $this->load_mp);
        $stmt->bindParam(':techn_conditions', $this->techn_conditions);
        $stmt->bindParam(':name_mp', $this->name_mp);
        $stmt->bindParam(':requested_roughness', $this->requested_roughness);
        $stmt->bindParam(':workpiece', $this->workpiece);
        $stmt->bindParam(':group_mp', $this->group_mp);
        $stmt->bindParam(':strength', $this->strength);
        $stmt->bindParam(':hardness_hb', $this->hardness_hb);
        $stmt->bindParam(':hardness_hrc', $this->hardness_hrc);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()){
           // echo "Data updated successfully in machined part<br>";
            return true;

        }else{
            // echo "Data not updated successfully in machined part<br>";
            return false;
        }
    }

}

