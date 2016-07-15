<?php
ini_set('display_errors', 1);
/**
 * Created by PhpStorm.
 * User: gaurav
 * Date: 3/6/16
 * Time: 12:46 PM
 */
class Tool
{
    public $tool_id;
    public $c;
    public $mn;
    public $si;
    public $cr;
    public $ni;
    public $v;
    public $mo;
    public $w;
    public $co;
    public $ti;
    public $fe;
    public $al;
    public $producer1;

    // For table tool
    public $producer2;
    public $description1;
    public $description2;
    public $cutting_index_insert1;
    public $cutting_index_insert2;
    public $chip_breaker1;
    public $chip_breaker2;
    public $grade1;
    public $grade2;
    public $cutting_speed1;
    public $cutting_speed2;
    public $revolution_rpm1;
    public $revolution_rpm2;
    public $feed_rev1;
    public $feed_rev2;
    public $feed_tooth1;
    public $feed_tooth2;
    public $feed_min1;
    public $feed_min2;
    private $conn;
    private $table_name = "ilptcrm_tool";

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
                  c=:c,mn=:mn,si=:si,cr=:cr, ni=:ni, v=:v, mo=:mo, w=:w, co=:co, ti=:ti, fe=:fe, al=:al,
                  producer1=:producer1, producer2=:producer2, description1=:description1, 
                  description2=:description2, cutting_index_insert1=:cutting_index_insert1, 
                  cutting_index_insert2=:cutting_index_insert2, chip_breaker1=:chip_breaker1,
                  chip_breaker2=:chip_breaker2,grade1=:grade1,grade2=:grade2,cutting_speed1=:cutting_speed1,
                  cutting_speed2=:cutting_speed2, revolution_rpm1=:revolution_rpm1,revolution_rpm2=:revolution_rpm2,                
                 feed_rev1=:feed_rev1,feed_rev2=:feed_rev2,feed_tooth1=:feed_tooth1,feed_tooth2=:feed_tooth2,
                 feed_min1=:feed_min1,feed_min2=:feed_min2";

        // prepare query
        $stmt = $this->conn->prepare($query);

        $this->c = htmlspecialchars(strip_tags($this->c));
        $this->mn = htmlspecialchars(strip_tags($this->mn));
        $this->si = htmlspecialchars(strip_tags($this->si));
        $this->cr = htmlspecialchars(strip_tags($this->cr));
        $this->ni = htmlspecialchars(strip_tags($this->ni));
        $this->v = htmlspecialchars(strip_tags($this->v));
        $this->mo = htmlspecialchars(strip_tags($this->mo));
        $this->w = htmlspecialchars(strip_tags($this->w));
        $this->co = htmlspecialchars(strip_tags($this->co));
        $this->ti = htmlspecialchars(strip_tags($this->ti));
        $this->fe = htmlspecialchars(strip_tags($this->fe));
        $this->al = htmlspecialchars(strip_tags($this->al));

        $this->producer1 = htmlspecialchars(strip_tags($this->producer1));
        $this->producer2 = htmlspecialchars(strip_tags($this->producer2));
        $this->description1 = htmlspecialchars(strip_tags($this->description1));
        $this->description2 = htmlspecialchars(strip_tags($this->description2));
        $this->cutting_index_insert1 = htmlspecialchars(strip_tags($this->cutting_index_insert1));
        $this->cutting_index_insert2 = htmlspecialchars(strip_tags($this->cutting_index_insert2));
        $this->chip_breaker1 = htmlspecialchars(strip_tags($this->chip_breaker1));
        $this->chip_breaker2 = htmlspecialchars(strip_tags($this->chip_breaker2));
        $this->grade1 = htmlspecialchars(strip_tags($this->grade1));
        $this->grade2 = htmlspecialchars(strip_tags($this->grade2));
        $this->cutting_speed1 = htmlspecialchars(strip_tags($this->cutting_speed1));
        $this->cutting_speed2 = htmlspecialchars(strip_tags($this->cutting_speed2));
        $this->revolution_rpm1 = htmlspecialchars(strip_tags($this->revolution_rpm1));
        $this->revolution_rpm2 = htmlspecialchars(strip_tags($this->revolution_rpm2));
        $this->feed_rev1 = htmlspecialchars(strip_tags($this->feed_rev1));
        $this->feed_rev2 = htmlspecialchars(strip_tags($this->feed_rev2));
        $this->feed_tooth1 = htmlspecialchars(strip_tags($this->feed_tooth1));
        $this->feed_tooth2 = htmlspecialchars(strip_tags($this->feed_tooth2));
        $this->feed_min1 = htmlspecialchars(strip_tags($this->feed_min1));
        $this->feed_min2 = htmlspecialchars(strip_tags($this->feed_min2));

        // Bind parameters for table tool
        $stmt->bindParam(":c", $this->c);
        $stmt->bindParam(":mn", $this->mn);
        $stmt->bindParam(":si", $this->si);
        $stmt->bindParam(":cr", $this->cr);
        $stmt->bindParam(":ni", $this->ni);
        $stmt->bindParam(":v", $this->v);
        $stmt->bindParam(":mo", $this->mo);
        $stmt->bindParam(":w", $this->w);
        $stmt->bindParam(":co", $this->co);
        $stmt->bindParam(":ti", $this->ti);
        $stmt->bindParam(":fe", $this->fe);
        $stmt->bindParam(":al", $this->al);

        $stmt->bindParam(":producer1", $this->producer1);
        $stmt->bindParam(":producer2", $this->producer2);
        $stmt->bindParam(":description1", $this->description1);
        $stmt->bindParam(":description2", $this->description2);
        $stmt->bindParam(":cutting_index_insert1", $this->cutting_index_insert1);
        $stmt->bindParam(":cutting_index_insert2", $this->cutting_index_insert2);
        $stmt->bindParam(":chip_breaker1", $this->chip_breaker1);
        $stmt->bindParam(":chip_breaker2", $this->chip_breaker2);
        $stmt->bindParam(":grade1", $this->grade1);
        $stmt->bindParam(":grade2", $this->grade2);
        $stmt->bindParam(":cutting_speed1", $this->cutting_speed1);
        $stmt->bindParam(":cutting_speed2", $this->cutting_speed2);
        $stmt->bindParam(":revolution_rpm1", $this->revolution_rpm1);
        $stmt->bindParam(":revolution_rpm2", $this->revolution_rpm2);
        $stmt->bindParam(":feed_rev1", $this->feed_rev1);
        $stmt->bindParam(":feed_rev2", $this->feed_rev2);
        $stmt->bindParam(":feed_tooth1", $this->feed_tooth1);
        $stmt->bindParam(":feed_tooth2", $this->feed_tooth2);
        $stmt->bindParam(":feed_min1", $this->feed_min1);
        $stmt->bindParam(":feed_min2", $this->feed_min2);
        // execute query
        if ($stmt->execute()) {
            // echo "Data into table tool is inserted successfully <br>";

            return true;
        } else {
            // echo "Data into table tool is not inserted successfully <br>";
            return false;
        }
    }

    function update()
    {


        $query = "UPDATE " . $this->table_name . " SET 
        c=:c, mn=:mn, si=:si, cr=:cr, ni=:ni, v=:v, mo=:mo, w=:w, co=:co, ti=:ti, fe=:fe, al=:al,
         producer1=:producer1, producer2=:producer2,description1=:description1,
                             description2=:description2, cutting_index_insert1=:cutting_index_insert1, cutting_index_insert2=:cutting_index_insert2, 
        chip_breaker1=:chip_breaker1, chip_breaker2=:chip_breaker2, grade1=:grade1, grade2=:grade2, cutting_speed1=:cutting_speed1,
        cutting_speed2=:cutting_speed2, revolution_rpm1=:revolution_rpm1, revolution_rpm2=:revolution_rpm2,feed_rev1=:feed_rev1,
        feed_rev2=:feed_rev2,feed_tooth1=:feed_tooth1,feed_tooth2=:feed_tooth2,feed_min1=:feed_min1,feed_min2=:feed_min2  WHERE id = :id";


        $stmt = $this->conn->prepare($query);
        $this->c = htmlspecialchars(strip_tags($this->c));
        $this->mn = htmlspecialchars(strip_tags($this->mn));
        $this->si = htmlspecialchars(strip_tags($this->si));
        $this->cr = htmlspecialchars(strip_tags($this->cr));
        $this->ni = htmlspecialchars(strip_tags($this->ni));
        $this->v = htmlspecialchars(strip_tags($this->v));
        $this->mo = htmlspecialchars(strip_tags($this->mo));
        $this->w = htmlspecialchars(strip_tags($this->w));
        $this->co = htmlspecialchars(strip_tags($this->co));
        $this->ti = htmlspecialchars(strip_tags($this->ti));
        $this->fe = htmlspecialchars(strip_tags($this->fe));
        $this->al = htmlspecialchars(strip_tags($this->al));
        
        $this->producer1 = htmlspecialchars(strip_tags($this->producer1));
        $this->producer2 = htmlspecialchars(strip_tags($this->producer2));
        $this->description1 = htmlspecialchars(strip_tags($this->description1));
        $this->description2 = htmlspecialchars(strip_tags($this->description2));
        $this->cutting_index_insert1 = htmlspecialchars(strip_tags($this->cutting_index_insert1));
        $this->cutting_index_insert2 = htmlspecialchars(strip_tags($this->cutting_index_insert2));
        $this->chip_breaker1 = htmlspecialchars(strip_tags($this->chip_breaker1));
        $this->chip_breaker2 = htmlspecialchars(strip_tags($this->chip_breaker2));
        $this->grade1 = htmlspecialchars(strip_tags($this->grade1));
        $this->grade2 = htmlspecialchars(strip_tags($this->grade2));
        $this->cutting_speed1 = htmlspecialchars(strip_tags($this->cutting_speed1));
        $this->cutting_speed2 = htmlspecialchars(strip_tags($this->cutting_speed2));
        $this->revolution_rpm1 = htmlspecialchars(strip_tags($this->revolution_rpm1));
        $this->revolution_rpm2 = htmlspecialchars(strip_tags($this->revolution_rpm2));
        $this->feed_rev1 = htmlspecialchars(strip_tags($this->feed_rev1));
        $this->feed_rev2 = htmlspecialchars(strip_tags($this->feed_rev2));
        $this->feed_tooth1 = htmlspecialchars(strip_tags($this->feed_tooth1));
        $this->feed_tooth2 = htmlspecialchars(strip_tags($this->feed_tooth2));
        $this->feed_min1 = htmlspecialchars(strip_tags($this->feed_min1));
        $this->feed_min2 = htmlspecialchars(strip_tags($this->feed_min2));


        $stmt->bindParam(':c', $this->c);
        $stmt->bindParam(':mn', $this->mn);
        $stmt->bindParam(':si', $this->si);
        $stmt->bindParam(':cr', $this->cr);
        $stmt->bindParam(':ni', $this->ni);
        $stmt->bindParam(':v', $this->v);
        $stmt->bindParam(':mo', $this->mo);
        $stmt->bindParam(':w', $this->w);
        $stmt->bindParam(':co', $this->co);
        $stmt->bindParam(':ti', $this->ti);
        $stmt->bindParam(':fe', $this->fe);
        $stmt->bindParam(':al', $this->al);
        

        $stmt->bindParam(':producer1', $this->producer1);
        $stmt->bindParam(':producer2', $this->producer2);
        $stmt->bindParam(':description1', $this->description1);
        $stmt->bindParam(':description2', $this->description2);
        $stmt->bindParam(':cutting_index_insert1', $this->cutting_index_insert1);
        $stmt->bindParam(':cutting_index_insert2', $this->cutting_index_insert2);
        $stmt->bindParam(':chip_breaker1', $this->chip_breaker1);
        $stmt->bindParam(':chip_breaker2', $this->chip_breaker2);
        $stmt->bindParam(':grade1', $this->grade1);
        $stmt->bindParam(':grade2', $this->grade2);
        $stmt->bindParam(':cutting_speed1', $this->cutting_speed1);
        $stmt->bindParam(':cutting_speed2', $this->cutting_speed2);
        $stmt->bindParam(':revolution_rpm1', $this->revolution_rpm1);
        $stmt->bindParam(':revolution_rpm2', $this->revolution_rpm2);
        $stmt->bindParam(':feed_rev1', $this->feed_rev1);
        $stmt->bindParam(':feed_rev2', $this->feed_rev2);
        $stmt->bindParam(':feed_tooth1', $this->feed_tooth1);
        $stmt->bindParam(':feed_tooth2', $this->feed_tooth2);
        $stmt->bindParam(':feed_min1', $this->feed_min1);
        $stmt->bindParam(':feed_min2', $this->feed_min2);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            // echo "Data  updated successfully in table tool<br>";
//            echo $stmt->debugDumpParams();
            return true;

        } else {
            // echo "Data not updated successfully in table tool<br>";
            return false;
        }
    }
}