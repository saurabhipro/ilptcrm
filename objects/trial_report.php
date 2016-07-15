<?php
ini_set('display_errors', 'On');
class Trialreport
{
    public $id;
    public $customer="";
    public $name="";
    public $date="";
    public $place="";
    public $technology="";
    public $type="";
    public $load_mp="";
    public $techn_conditions="";
    public $name_mp="";
    public $requested_roughness="";
    public $workpiece="";
    public $group_mp="";
    public $strength="";
    public $hardness_hb="";
    public $hardness_hrc ="";
    private $table_name = "ilptcrm_testreport";
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function create()
    {
        $query = "INSERT INTO 
            " . $this->table_name . " 
            SET
              customer =:customer,name =:name,date =:date,place =:place,technology =:technology";

        $stmt = $this->conn->prepare($query);
        $this->customer = htmlspecialchars(strip_tags($this->customer));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->place = htmlspecialchars(strip_tags($this->place));
        $this->technology = htmlspecialchars(strip_tags($this->technology));
        $stmt->bindParam(":customer", $this->customer);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":place", $this->place);
        $stmt->bindParam(":technology", $this->technology);

        // execute query
        if ($stmt->execute()) {
            // echo "Data inserted in the Trail Report <br>" ;
            return true;
        } else {
            // echo "Data not inserted in the Trail Report <br>";
            return false;
        }
    }

    // read trial report
    function readAll()
    {

        $query = "SELECT  a.id , a.customer, a.name, a.date, a.place, a.technology  
        , b.techn_conditions ,b.name_mp,b.requested_roughness,b.workpiece,b.group_mp,
        b.strength,b.hardness_hb,b.hardness_hrc, b.application_description  FROM ilptcrm_testreport a ,ilptcrm_machined_part b 
         where a.id = b.id ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // used when filling up the update test_report form
    function readOne()
    {
        $query = "SELECT
            a.id,
            a.customer,
            a.name,
            a.date,
            a.place,
            a.technology,
            b.id,
            b.type,
            b.techn_conditions,
            b.load_mp,
            b.name_mp,
            b.requested_roughness,
            b.workpiece,
            b.group_mp,
            b.strength,
            b.hardness_hb,
            b.hardness_hrc,
            b.application_description,
            c.id,
            c.c,
            c.mn,
            c.si,
            c.cr,
            c.ni,
            c.v,
            c.mo,
            c.w,
            c.co,
            c.ti,
            c.fe,
            c.al,
            c.producer1,
            c.producer2,
            c.description1,
            c.description2,
            c.cutting_index_insert1,
            c.cutting_index_insert2,
            c.chip_breaker1,
            c.chip_breaker2,
            c.grade1,
            c.grade2,
            c.cutting_speed1,
            c.cutting_speed2,
            c.revolution_rpm1,
            c.revolution_rpm2,
            c.feed_rev1,
            c.feed_rev2,
            c.feed_min1,
            c.feed_min2,
            c.feed_tooth1,
            c.feed_tooth2,            
            d.id,
            d.coolant1,
            d.coolant2,
            d.surface_quality1,
            d.surface_quality2,
            d.cutting_depth1,
            d.cutting_depth2,
            d.machine_surface_width1,
            d.machine_surface_width2,
            d.thread_pitch1,
            d.thread_pitch2,
            d.number_of_infeed1,
            d.number_of_infeed2,
            d.cutting_length1,
            d.cutting_length2,
            d.depth_of_grooving1,
            d.depth_of_grooving2,
            d.surface_skin1,
            d.surface_skin2,
            d.interrupted_cut1,
            d.interrupted_cut2,
            d.q1,
            d.q2,
                        
            e.id,
            e.durability_of_edge1,
            e.durability_of_edge2,
            e.flank_wear1,
            e.flank_wear2,
            e.insert_fracture_fragile1,
            e.insert_fracture_fragile2,
            e.durability_pcs1,
            e.durability_pcs2,
            e.built_up_edge1,
            e.built_up_edge2,
            e.nose_tip_plastic_deformation1,
            e.nose_tip_plastic_deformation2,
            e.kind_of_chip1,
            e.kind_of_chip2,
            e.rigidity_of_system1,
            e.rigidity_of_system2,
            e.successful_stories,
            e.attachment,
            e.technical_evaluation,
            e.included_test_to_the_general_evaluation,
            e.notes,

            f.cost_per_hour1,
            f.cost_per_hour2,
            f.durability_of_edge1,
            f.durability_of_edge2,
            f.durability_pcs1,
            f.durability_pcs2,
            f.machine_time1,
            f.machine_time2,
            f.tool1,
            f.tool2,
            f.tool_cost1,
            f.tool_cost2,
            f.no_of_inserts1,
            f.no_of_inserts2,
            f.cutting_index_insert1,
            f.cutting_index_insert2,
            f.grade1,
            f.grade2,
            f.insert_of_cost1,
            f.insert_of_cost2,
            f.no_of_cutting_edges1,
            f.no_of_cutting_edges2,
            f.tool_cost_cn1,
            f.tool_cost_cn2,
            f.tool_exchange_cost1,
            f.tool_exchange_cost2,
            f.machining_cost1,
            f.machining_cost2,
            f.total_cost1,
            f.total_cost2,
            f.savings
        FROM
            ilptcrm_testreport a,
            ilptcrm_machined_part b,
            ilptcrm_tool c,
            ilptcrm_cutting_conditions d,
            ilptcrm_evaluation e,
            ilptcrm_spending f
        WHERE
            a.id = ? 
            AND b.id = ? 
            AND c.id = ?
            AND d.id = ?
            AND e.id = ?
            AND f.id = ?
            order by a.id ASC 

";


        // Section 1
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->bindParam(2, $this->id);
        $stmt->bindParam(3, $this->id);
        $stmt->bindParam(4, $this->id);
        $stmt->bindParam(5, $this->id);
        $stmt->bindParam(6, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->customer = $row['customer'];
        $this->name = $row['name'];
        $this->date = $row['date'];
        $this->place = $row['place'];
        $this->technology = $row['technology'];

        //Section 2
        $this->type = $row['type'];
        $this->techn_conditions = $row['techn_conditions'];
        $this->load_mp = $row['load_mp'];
        $this->name_mp = $row['name_mp'];
        $this->requested_roughness = $row['requested_roughness'];
        $this->workpiece = $row['workpiece'];
        $this->group_mp = $row['group_mp'];
        $this->strength = $row['strength'];
        $this->hardness_hb = $row['hardness_hb'];
        $this->hardness_hrc = $row['hardness_hrc'];

        //Section 3
        $this->c = $row['c'];
        $this->mn = $row['mn'];
        $this->si = $row['si'];
        $this->cr = $row['cr'];
        $this->ni = $row['ni'];
        $this->v = $row['v'];
        $this->mo = $row['mo'];
        $this->w = $row['w'];
        $this->co = $row['co'];
        $this->ti = $row['ti'];
        $this->fe = $row['fe'];
        $this->al = $row['al'];
        $this->producer1 = $row['producer1'];
        $this->producer2 = $row['producer2'];
        $this->description1 = $row['description1'];
        $this->description2 = $row['description2'];
        $this->cutting_index_insert1 = $row['cutting_index_insert1'];
        $this->cutting_index_insert2 = $row['cutting_index_insert2'];
        $this->chip_breaker1 = $row['chip_breaker1'];
        $this->chip_breaker2 = $row['chip_breaker2'];
        $this->grade1 = $row['grade1'];
        $this->grade2 = $row['grade2'];
        $this->cutting_speed1 = $row['cutting_speed1'];
        $this->cutting_speed2 = $row['cutting_speed2'];
        $this->revolution_rpm1 = $row['revolution_rpm1'];
        $this->revolution_rpm2 = $row['revolution_rpm2'];
        $this->feed_rev1 = $row['feed_rev1'];
        $this->feed_rev2 = $row['feed_rev2'];
        $this->feed_min1 = $row['feed_min1'];
        $this->feed_min2 = $row['feed_min2'];
        $this->feed_tooth1 = $row['feed_tooth1'];
        $this->feed_tooth2 = $row['feed_tooth2'];

        //Section 4

        $this->cutting_depth1 = $row['cutting_depth1'];
        $this->cutting_depth2 = $row['cutting_depth2'];
        $this->machine_surface_width1 = $row['machine_surface_width1'];
        $this->machine_surface_width2 = $row['machine_surface_width2'];
        $this->thread_pitch1 = $row['thread_pitch1'];
        $this->thread_pitch2 = $row['thread_pitch2'];
        $this->number_of_infeed1 = $row['number_of_infeed1'];
        $this->number_of_infeed2 = $row['number_of_infeed2'];
        $this->cutting_length1 = $row['cutting_length1'];
        $this->cutting_length2 = $row['cutting_length2'];
        $this->depth_of_grooving1 = $row['depth_of_grooving1'];
        $this->depth_of_grooving2 = $row['depth_of_grooving2'];
        $this->surface_skin1 = $row['surface_skin1'];
        $this->surface_skin2 = $row['surface_skin2'];
        $this->interrupted_cut1 = $row['interrupted_cut1'];
        $this->interrupted_cut2 = $row['interrupted_cut2'];
        $this->coolant1 = $row['coolant1'];
        $this->coolant2 = $row['coolant2'];
        $this->surface_quality1 = $row['surface_quality1'];
        $this->surface_quality2 = $row['surface_quality2'];
        $this->q1 = $row['q1'];
        $this->q2 = $row['q2'];


        // //Section  5 , Evaluation
        $this->durability_of_edge1 = $row['durability_of_edge1'];
        $this->durability_of_edge2 = $row['durability_of_edge2'];
        $this->durability_pcs1 = $row['durability_pcs1'];
        $this->durability_pcs2 = $row['durability_pcs2'];
        $this->flank_wear1 = $row['flank_wear1'];
        $this->flank_wear2 = $row['flank_wear2'];
        $this->insert_fracture_fragile1 = $row['insert_fracture_fragile1'];
        $this->insert_fracture_fragile2 = $row['insert_fracture_fragile2'];
        $this->built_up_edge1 = $row['built_up_edge1'];
        $this->built_up_edge2 = $row['built_up_edge2'];
        $this->nose_tip_plastic_deformation1 = $row['nose_tip_plastic_deformation1'];
        $this->nose_tip_plastic_deformation2 = $row['nose_tip_plastic_deformation2'];
        $this->kind_of_chip1 = $row['kind_of_chip1'];
        $this->kind_of_chip2 = $row['kind_of_chip2'];
        $this->rigidity_of_system1 = $row['rigidity_of_system1'];
        $this->rigidity_of_system2 = $row['rigidity_of_system2'];
        $this->attachment = $row['attachment'];
        $this->successful_stories = $row['successful_stories'];
        $this->technical_evaluation = $row['technical_evaluation'];
        $this->included_test_to_the_general_evaluation = $row['included_test_to_the_general_evaluation'];
        $this->notes = $row['notes'];
        // Section 6 , 


        $this->cost_per_hour1= $row['cost_per_hour1'];
        $this->cost_per_hour2= $row['cost_per_hour2'];
        $this->durability_of_edge1= $row['durability_of_edge1'];
        $this->durability_of_edge2= $row['durability_of_edge2'];
        $this->durability_pcs1= $row['durability_of_edge1'];
        $this->durability_pcs2= $row['durability_of_edge2'];
        $this->machine_time1= $row['machine_time1'];
        $this->machine_time2= $row['machine_time2'];
        $this->tool1= $row['tool1'];
        $this->tool2= $row['tool2'];
        $this->tool_cost1= $row['tool_cost1'];
        $this->tool_cost2= $row['tool_cost2'];
        $this->no_of_inserts1= $row['no_of_inserts1'];
        $this->no_of_inserts2= $row['no_of_inserts2'];
        $this->cutting_index_insert1= $row['cutting_index_insert1'];
        $this->cutting_index_insert2= $row['cutting_index_insert2'];
        $this->grade1= $row['grade1'];
        $this->grade2= $row['grade2'];
        $this->insert_of_cost1= $row['insert_of_cost1'];
        $this->insert_of_cost2= $row['insert_of_cost2'];
        $this->no_of_cutting_edges1= $row['no_of_cutting_edges1'];
        $this->no_of_cutting_edges2= $row['no_of_cutting_edges2'];
        $this->tool_cost_cn1= $row['tool_cost_cn1'];
        $this->tool_cost_cn2= $row['tool_cost_cn2'];
        $this->tool_exchange_cost1= $row['tool_exchange_cost1'];
        $this->tool_exchange_cost2= $row['tool_exchange_cost2'];
        $this->machining_cost1= $row['machining_cost1'];
        $this->machining_cost2= $row['machining_cost2'];
        $this->total_cost1= $row['total_cost1'];
        $this->total_cost2= $row['total_cost2'];
        $this->savings= $row['savings'];


    }

    // update the trialreport
    function update()
    {

        // update query

        $query = "UPDATE ".$this->table_name."   SET customer = :customer, name = :name, date = :date,
        place = :place,  technology = :technology   WHERE id =:id";
        $stmt = $this->conn->prepare($query);
        $this->customer = htmlspecialchars(strip_tags($this->customer));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->place = htmlspecialchars(strip_tags($this->place));
        $this->technology = htmlspecialchars(strip_tags($this->technology));
        $stmt->bindParam(':customer', $this->customer);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':place', $this->place);
        $stmt->bindParam(':technology', $this->technology);
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
