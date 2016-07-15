<?php

class ToolSpending
{
    public $id;
    public $cost_per_hour1;
    public $cost_per_hour2;
    public $durability_of_edge1;
    public $durability_of_edge2;
    public $durability_pcs1;
    public $durability_pcs2;
    public $machine_time1;
    public $machine_time2;
    public $tool1;
    public $tool2;
    public $tool_cost1;
    public $tool_cost2;
    public $no_of_inserts1;
    public $no_of_inserts2;
    public $cutting_index_insert1;
    public $cutting_index_insert2;
    public $grade1;
    public $grade2;
    public $insert_of_cost1;
    public $insert_of_cost2;
    public $no_of_cutting_edges1;
    public $no_of_cutting_edges2;
    public $tool_cost_cn1;
    public $tool_cost_cn2;
    public $tool_exchange_cost1;
    public $tool_exchange_cost2;
    public $machining_cost1;
    public $machining_cost2;
    public $total_cost1;
    public $total_cost2;
    private $conn;
    private $table_name = "ilptcrm_spending";


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
                " . $this->table_name. "
            SET 
                 cost_per_hour1=:cost_per_hour1,
                 cost_per_hour2=:cost_per_hour2,
                 durability_of_edge1=:durability_of_edge1,
                 durability_of_edge2=:durability_of_edge2,
                 durability_pcs1=:durability_pcs1,
                 durability_pcs2=:durability_pcs2,
                 machine_time1=:machine_time1,
                 machine_time2=:machine_time2,
                 tool1=:tool1,
                 tool2=:tool2,
                 tool_cost1=:tool_cost1,
                 tool_cost2=:tool_cost2,
                 no_of_inserts1=:no_of_inserts1,
                 no_of_inserts2=:no_of_inserts2,
                 cutting_index_insert1=:cutting_index_insert1,
                 cutting_index_insert2=:cutting_index_insert2,
                 grade1=:grade1,
                 grade2=:grade2,
                 insert_of_cost1=:insert_of_cost1,
                 insert_of_cost2=:insert_of_cost2,
                 no_of_cutting_edges1=:no_of_cutting_edges1,
                 no_of_cutting_edges2=:no_of_cutting_edges2,
                 tool_cost_cn1=:tool_cost_cn1,
                 tool_cost_cn2=:tool_cost_cn2,
                 tool_exchange_cost1=:tool_exchange_cost1,
                 tool_exchange_cost2=:tool_exchange_cost2,
                 machining_cost1=:machining_cost1,
                 machining_cost2=:machining_cost2,
                 total_cost1=:total_cost1,
                 total_cost2=:total_cost2";


        // prepare query
        $stmt = $this->conn->prepare($query);
        // posted values
         $this->cost_per_hour1 = htmlspecialchars(strip_tags($this->cost_per_hour1));
         $this->cost_per_hour2 = htmlspecialchars(strip_tags($this->cost_per_hour2));
         $this->durability_of_edge1 = htmlspecialchars(strip_tags($this->durability_of_edge1));
         $this->durability_of_edge2 = htmlspecialchars(strip_tags($this->durability_of_edge2));
         $this->durability_pcs1 = htmlspecialchars(strip_tags($this->durability_pcs1));
         $this->durability_pcs2 = htmlspecialchars(strip_tags($this->durability_pcs2));
         $this->machine_time1 = htmlspecialchars(strip_tags($this->machine_time1));
         $this->machine_time2 = htmlspecialchars(strip_tags($this->machine_time2));
         $this->tool1 = htmlspecialchars(strip_tags($this->tool1));
         $this->tool2 = htmlspecialchars(strip_tags($this->tool2));
         $this->tool_cost1 = htmlspecialchars(strip_tags($this->tool_cost1));
         $this->tool_cost2 = htmlspecialchars(strip_tags($this->tool_cost2));
         $this->no_of_inserts1 = htmlspecialchars(strip_tags($this->no_of_inserts1));
         $this->no_of_inserts2 = htmlspecialchars(strip_tags($this->no_of_inserts2));
         $this->cutting_index_insert1 = htmlspecialchars(strip_tags($this->cutting_index_insert1));
         $this->cutting_index_insert2 = htmlspecialchars(strip_tags($this->cutting_index_insert2));
         $this->grade1 = htmlspecialchars(strip_tags($this->grade1));
         $this->grade2 = htmlspecialchars(strip_tags($this->grade2));
         $this->insert_of_cost1 = htmlspecialchars(strip_tags($this->insert_of_cost1));
         $this->insert_of_cost2 = htmlspecialchars(strip_tags($this->insert_of_cost2));
         $this->no_of_cutting_edges1 = htmlspecialchars(strip_tags($this->no_of_cutting_edges1));
         $this->no_of_cutting_edges2 = htmlspecialchars(strip_tags($this->no_of_cutting_edges2));
         $this->tool_cost_cn1 = htmlspecialchars(strip_tags($this->tool_cost_cn1));
         $this->tool_cost_cn2 = htmlspecialchars(strip_tags($this->tool_cost_cn2));
         $this->tool_exchange_cost1 = htmlspecialchars(strip_tags($this->tool_exchange_cost1));
         $this->tool_exchange_cost2 = htmlspecialchars(strip_tags($this->tool_exchange_cost2));
         $this->machining_cost1 = htmlspecialchars(strip_tags($this->machining_cost1));
         $this->machining_cost2 = htmlspecialchars(strip_tags($this->machining_cost2));
         $this->total_cost1 = htmlspecialchars(strip_tags($this->total_cost1));
         $this->total_cost2 = htmlspecialchars(strip_tags($this->total_cost2));
        

                  

        // bind values
        $stmt->bindParam(":cost_per_hour1", $this->cost_per_hour1);
        $stmt->bindParam(":cost_per_hour2", $this->cost_per_hour2);
        $stmt->bindParam(":durability_of_edge1", $this->durability_of_edge1);
        $stmt->bindParam(":durability_of_edge2", $this->durability_of_edge2);
        $stmt->bindParam(":durability_pcs1", $this->durability_pcs1);
        $stmt->bindParam(":durability_pcs2", $this->durability_pcs2);
        $stmt->bindParam(":machine_time1", $this->machine_time1);
        $stmt->bindParam(":machine_time2", $this->machine_time2);
        $stmt->bindParam(":tool1", $this->tool1);
        $stmt->bindParam(":tool2", $this->tool2);
        $stmt->bindParam(":tool_cost1", $this->tool_cost1);
        $stmt->bindParam(":tool_cost2", $this->tool_cost2);
        $stmt->bindParam(":no_of_inserts1", $this->no_of_inserts1);
        $stmt->bindParam(":no_of_inserts2", $this->no_of_inserts2);
        $stmt->bindParam(":cutting_index_insert1", $this->cutting_index_insert1);
        $stmt->bindParam(":cutting_index_insert2", $this->cutting_index_insert2);
        $stmt->bindParam(":grade1", $this->grade1);
        $stmt->bindParam(":grade2", $this->grade2);
        $stmt->bindParam(":insert_of_cost1", $this->insert_of_cost1);
        $stmt->bindParam(":insert_of_cost2", $this->insert_of_cost2);
        $stmt->bindParam(":no_of_cutting_edges1", $this->no_of_cutting_edges1);
        $stmt->bindParam(":no_of_cutting_edges2", $this->no_of_cutting_edges2);
        $stmt->bindParam(":tool_cost_cn1", $this->tool_cost_cn1);
        $stmt->bindParam(":tool_cost_cn2", $this->tool_cost_cn2);
        $stmt->bindParam(":tool_exchange_cost1", $this->tool_exchange_cost1);
        $stmt->bindParam(":tool_exchange_cost2", $this->tool_exchange_cost2);
        $stmt->bindParam(":machining_cost1", $this->machining_cost1);
        $stmt->bindParam(":machining_cost2", $this->machining_cost2);
        $stmt->bindParam(":total_cost1", $this->total_cost1);
        $stmt->bindParam(":total_cost2", $this->total_cost2);

        // execute query
        if ($stmt->execute()) {
             echo "Data  inserted in Tool_Spending ";
            return true;
        } else {
             echo "Data  not inserted in Tool_Spending ";
            return false;
        }
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
    function update()
    {


        $query = "UPDATE " . $this->table_name. " SET cost_per_hour1=:cost_per_hour1,
                 cost_per_hour2=:cost_per_hour2,
                 durability_of_edge1=:durability_of_edge1,
                 durability_of_edge2=:durability_of_edge2,
                 durability_pcs1=:durability_pcs1,
                 durability_pcs2=:durability_pcs2,
                 machine_time1=:machine_time1,
                 machine_time2=:machine_time2,
                 tool1=:tool1,
                 tool2=:tool2,
                 tool_cost1=:tool_cost1,
                 tool_cost2=:tool_cost2,
                 no_of_inserts1=:no_of_inserts1,
                 no_of_inserts2=:no_of_inserts2,
                 cutting_index_insert1=:cutting_index_insert1,
                 cutting_index_insert2=:cutting_index_insert2,
                 grade1=:grade1,
                 grade2=:grade2,
                 insert_of_cost1=:insert_of_cost1,
                 insert_of_cost2=:insert_of_cost2,
                 no_of_cutting_edges1=:no_of_cutting_edges1,
                 no_of_cutting_edges2=:no_of_cutting_edges2,
                 tool_cost_cn1=:tool_cost_cn1,
                 tool_cost_cn2=:tool_cost_cn2,
                 tool_exchange_cost1=:tool_exchange_cost1,
                 tool_exchange_cost2=:tool_exchange_cost2,
                 machining_cost1=:machining_cost1,
                 machining_cost2=:machining_cost2,
                 total_cost1=:total_cost1,
                 total_cost2=:total_cost2
                 WHERE id=:id";


        $stmt = $this->conn->prepare($query);


        $this->cost_per_hour1 = htmlspecialchars(strip_tags($this->cost_per_hour1));
        $this->cost_per_hour2 = htmlspecialchars(strip_tags($this->cost_per_hour2));
        $this->durability_of_edge1 = htmlspecialchars(strip_tags($this->durability_of_edge1));
        $this->durability_of_edge2 = htmlspecialchars(strip_tags($this->durability_of_edge2));
        $this->durability_pcs1 = htmlspecialchars(strip_tags($this->durability_pcs1));
        $this->durability_pcs2 = htmlspecialchars(strip_tags($this->durability_pcs2));
        $this->machine_time1 = htmlspecialchars(strip_tags($this->machine_time1));
        $this->machine_time2 = htmlspecialchars(strip_tags($this->machine_time2));
        $this->tool1 = htmlspecialchars(strip_tags($this->tool1));
        $this->tool2 = htmlspecialchars(strip_tags($this->tool2));
        $this->tool_cost1 = htmlspecialchars(strip_tags($this->tool_cost1));
        $this->tool_cost2 = htmlspecialchars(strip_tags($this->tool_cost2));
        $this->no_of_inserts1 = htmlspecialchars(strip_tags($this->no_of_inserts1));
        $this->no_of_inserts2 = htmlspecialchars(strip_tags($this->no_of_inserts2));
        $this->cutting_index_insert1 = htmlspecialchars(strip_tags($this->cutting_index_insert1));
        $this->cutting_index_insert2 = htmlspecialchars(strip_tags($this->cutting_index_insert2));
        $this->grade1 = htmlspecialchars(strip_tags($this->grade1));
        $this->grade2 = htmlspecialchars(strip_tags($this->grade2));
        $this->insert_of_cost1 = htmlspecialchars(strip_tags($this->insert_of_cost1));
        $this->insert_of_cost2 = htmlspecialchars(strip_tags($this->insert_of_cost2));
        $this->no_of_cutting_edges1 = htmlspecialchars(strip_tags($this->no_of_cutting_edges1));
        $this->no_of_cutting_edges2 = htmlspecialchars(strip_tags($this->no_of_cutting_edges2));
        $this->tool_cost_cn1 = htmlspecialchars(strip_tags($this->tool_cost_cn1));
        $this->tool_cost_cn2 = htmlspecialchars(strip_tags($this->tool_cost_cn2));
        $this->tool_exchange_cost1 = htmlspecialchars(strip_tags($this->tool_exchange_cost1));
        $this->tool_exchange_cost2 = htmlspecialchars(strip_tags($this->tool_exchange_cost2));
        $this->machining_cost1 = htmlspecialchars(strip_tags($this->machining_cost1));
        $this->machining_cost2 = htmlspecialchars(strip_tags($this->machining_cost2));
        $this->total_cost1 = htmlspecialchars(strip_tags($this->total_cost1));
        $this->total_cost2 = htmlspecialchars(strip_tags($this->total_cost2));
        $this->id = htmlspecialchars(strip_tags($this->id));


        // bind values
        $stmt->bindParam(":cost_per_hour1", $this->cost_per_hour1);
        $stmt->bindParam(":cost_per_hour2", $this->cost_per_hour2);
        $stmt->bindParam(":durability_of_edge1", $this->durability_of_edge1);
        $stmt->bindParam(":durability_of_edge2", $this->durability_of_edge2);
        $stmt->bindParam(":durability_pcs1", $this->durability_pcs1);
        $stmt->bindParam(":durability_pcs2", $this->durability_pcs2);
        $stmt->bindParam(":machine_time1", $this->machine_time1);
        $stmt->bindParam(":machine_time2", $this->machine_time2);
        $stmt->bindParam(":tool1", $this->tool1);
        $stmt->bindParam(":tool2", $this->tool2);
        $stmt->bindParam(":tool_cost1", $this->tool_cost1);
        $stmt->bindParam(":tool_cost2", $this->tool_cost2);
        $stmt->bindParam(":no_of_inserts1", $this->no_of_inserts1);
        $stmt->bindParam(":no_of_inserts2", $this->no_of_inserts2);
        $stmt->bindParam(":cutting_index_insert1", $this->cutting_index_insert1);
        $stmt->bindParam(":cutting_index_insert2", $this->cutting_index_insert2);
        $stmt->bindParam(":grade1", $this->grade1);
        $stmt->bindParam(":grade2", $this->grade2);
        $stmt->bindParam(":insert_of_cost1", $this->insert_of_cost1);
        $stmt->bindParam(":insert_of_cost2", $this->insert_of_cost2);
        $stmt->bindParam(":no_of_cutting_edges1", $this->no_of_cutting_edges1);
        $stmt->bindParam(":no_of_cutting_edges2", $this->no_of_cutting_edges2);
        $stmt->bindParam(":tool_cost_cn1", $this->tool_cost_cn1);
        $stmt->bindParam(":tool_cost_cn2", $this->tool_cost_cn2);
        $stmt->bindParam(":tool_exchange_cost1", $this->tool_exchange_cost1);
        $stmt->bindParam(":tool_exchange_cost2", $this->tool_exchange_cost2);
        $stmt->bindParam(":machining_cost1", $this->machining_cost1);
        $stmt->bindParam(":machining_cost2", $this->machining_cost2);
        $stmt->bindParam(":total_cost1", $this->total_cost1);
        $stmt->bindParam(":total_cost2", $this->total_cost2);
        $stmt->bindParam(":id", $this->id);

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