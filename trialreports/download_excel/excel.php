<table border="1">
    <tr>
        <th>Id</th>
        <th>Customer</th>
        <th>Name</th>
        <th>Date</th>
        <th>Place</th>
        <th>Technology</th>
        <th>Type</th>
        <th>Load</th>
        <th>Technical Conditions</th>
        <th>Name</th>
        <th>Requested Roughness</th>
        <th>Workpiece</th>
        <th>Group</th>
        <th>Strength</th>
        <th>Hardness</th>
        <th>Cutting Index Insert1</th>
        <th>Cutting Index Insert2</th>
        <th>Chip Breaker1</th>
        <th>Chip Breaker2</th>
        <th>Grade1</th>
        <th>Grade2</th>
        <th>Cutting Speed1</th>
        <th>Cutting Speed2</th>
        <th>Revolution rpm1</th>
        <th>Revolution rpm2</th>
        <th>Feed rev1</th>
        <th>Feed rev2</th>
        <th>Feed min1</th>
        <th>Feed min2</th>
        <th>Feed Tooth1</th>
        <th>Feed Tooth2</th>
        <th>Producer1</th>
        <th>Producer2</th>
        <th>Description1</th>
        <th>Description2</th>
        <th>Depth Of Grooving1</th>
        <th>Depth Of Grooving2</th>
        <th>Surface Skin1</th>
        <th>Surface Skin2</th>
        <th>Interrupted Cut1</th>
        <th>Interrupted Cut2</th>
        <th>Coolant1</th>
        <th>Coolant2</th>
        <th>Surface Quality1</th>
        <th>Surface Quality2</th>
        <th>Cutting Depth1</th>
        <th>Cutting Depth2</th>
        <th>Machine Surface Width1</th>
        <th>Machine Surface Width2</th>
        <th>Thread Pitch1</th>
        <th>Thread Pitch2</th>
        <th>Number Of Infeed1</th>
        <th>Number Of Infeed2</th>
        <th>Cutting Length1</th>
        <th>Cutting Length2</th>
        <th>Durability Of Edge1</th>
        <th>Durability Of Edge2</th>
        <th>Flank Wear1</th>
        <th>Flank Wear2</th>
        <th>Insert Fracture Fragile1</th>
        <th>Insert Fracture Fragile2</th>
        <th>Durability pcs1</th>
        <th>Durability pcs2</th>
        <th>Built Up Edge1</th>
        <th>Built Up Edge2</th>
        <th>Nose Tip Plastic Deformation1</th>
        <th>Nose Tip Plastic Deformation2</th>
        <th>Kind Of Chip1</th>
        <th>Kind Of Chip2</th>
        <th>Rigidity Of System1</th>
        <th>Rigidity Of System2</th>
    </tr>

    <?php
    $mysqli = new mysqli('localhost', 'root', '1234','ilptcrm');
    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
            b.requested_roughness,
            b.workpiece,
            b.group_mp,
            b.strength,
            b.hardness_hb,
            c.id,
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
            c.producer1,
            c.producer2,
            c.description1,
            c.description2,
            
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
            e.rigidity_of_system2
        FROM
            ilptcrm_testreport a,
            ilptcrm_machined_part b,
            ilptcrm_tool c,
            ilptcrm_cutting_conditions d,
            ilptcrm_evaluation e
        WHERE
            a.id = b.id 
            AND b.id = c.id 
            AND c.id = d.id
            AND d.id = e.id
            ";

    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($data = $result->fetch_assoc()) {
            echo '
		<tr>
		<td>' . $data['id'] . '</td>
		<td>' . $data['customer'] . '</td>
		<td>' . $data['name'] . '</td>
		<td>' . $data['date'] . '</td>
		<td>' . $data['place'] . '</td>
		<td>' . $data['technology'] . '</td>				
		<td>' . $data['type'] . '</td>
		<td>' . $data['load_mp'] . '</td>
		<td>' . $data['techn_conditions'] . '</td>
		<td>' . $data['load_mp'] . '</td>
		<td>' . $data['requested_roughness'] . '</td>
		<td>' . $data['workpiece'] . '</td>
		<td>' . $data['group_mp'] . '</td>
		<td>' . $data['strength'] . '</td>
		<td>' . $data['hardness_hb'] . '</td>
        <td>' . $data['cutting_index_insert1'] . '</td>
        <td>' . $data['cutting_index_insert2'] . '</td>
        <td>' . $data['chip_breaker1'] . '</td>
        <td>' . $data['chip_breaker2'] . '</td>
        <td>' . $data['grade1'] . '</td>
        <td>' . $data['grade2'] . '</td>
        <td>' . $data['cutting_speed1'] . '</td>
        <td>' . $data['cutting_speed2'] . '</td>
        <td>' . $data['revolution_rpm1'] . '</td>
        <td>' . $data['revolution_rpm2'] . '</td>
        <td>' . $data['feed_rev1'] . '</td>
        <td>' . $data['feed_rev2'] . '</td>
        <td>' . $data['feed_min1'] . '</td>
        <td>' . $data['feed_min2'] . '</td>
        <td>' . $data['feed_tooth1'] . '</td>
        <td>' . $data['feed_tooth2'] . '</td>
        <td>' . $data['producer1'] . '</td>
        <td>' . $data['producer2'] . '</td>
        <td>' . $data['description1'] . '</td>
        <td>' . $data['description2'] . '</td>
        <td>' . $data['depth_of_grooving1'] . '</td>
        <td>' . $data['depth_of_grooving2'] . '</td>
        <td>' . $data['surface_skin1'] . '</td>
        <td>' . $data['surface_skin2'] . '</td>
        <td>' . $data['interrupted_cut1'] . '</td>
        <td>' . $data['interrupted_cut2'] . '</td>
        <td>' . $data['coolant1'] . '</td>
        <td>' . $data['coolant2'] . '</td>
        <td>' . $data['surface_quality1'] . '</td>
        <td>' . $data['surface_quality2'] . '</td>
        <td>' . $data['cutting_depth1'] . '</td>
        <td>' . $data['cutting_depth2'] . '</td>
        <td>' . $data['machine_surface_width1'] . '</td>
        <td>' . $data['machine_surface_width2'] . '</td>
        <td>' . $data['thread_pitch1'] . '</td>
        <td>' . $data['thread_pitch2'] . '</td>
        <td>' . $data['number_of_infeed1'] . '</td>
        <td>' . $data['number_of_infeed2'] . '</td>
        <td>' . $data['cutting_length1'] . '</td>
        <td>' . $data['cutting_length2'] . '</td>
        <td>' . $data['durability_of_edge1'] . '</td>
        <td>' . $data['durability_of_edge2'] . '</td>
        <td>' . $data['flank_wear1'] . '</td>
        <td>' . $data['flank_wear2'] . '</td>
        <td>' . $data['insert_fracture_fragile1'] . '</td>
        <td>' . $data['insert_fracture_fragile2'] . '</td>
        <td>' . $data['durability_pcs1'] . '</td>
        <td>' . $data['durability_pcs2'] . '</td>
        <td>' . $data['built_up_edge1'] . '</td>
        <td>' . $data['built_up_edge2'] . '</td>
        <td>' . $data['nose_tip_plastic_deformation1'] . '</td>
        <td>' . $data['nose_tip_plastic_deformation2'] . '</td>
        <td>' . $data['kind_of_chip1'] . '</td>
        <td>' . $data['kind_of_chip2'] . '</td>
        <td>' . $data['rigidity_of_system1'] . '</td>
        <td>' . $data['rigidity_of_system2'] . '</td> 
		</tr>
		';
        }
    } else {
        echo "0 results";
    }
    $mysqli->close();
    ?>
</table>