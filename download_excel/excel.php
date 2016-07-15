<table border="1">
    <tr>
        <th>id</th>
        <th>type</th>
        <th>load_mp</th>
        <th>techn_conditions</th>
        <th>name_mp</th>
        <th>requested_roughness</th>
        <th>workpiece</th>
        <th>group_mp</th>
        <th>strength</th>
        <th>hardness_hb</th>
    </tr>
    <?php
    ini_set('display_errors', 1);
    //connection to mysql
    //	$conn= mysqli_connect("localhost", "root", "root", "ilptcrm"); //server , username , password
    mysql_connect("localhost", "root", "root"); //server , username , password
    mysql_select_db("ilptcrm");
    //query get data

    $sql = mysql_query("SELECT id,type,load_mp,techn_conditions,name_mp,requested_roughness,workpiece,group_mp,strength,hardness_hb FROM ilptcrm_machined_part ORDER BY id DESC");

    $no = 1;
    while ($data = mysql_fetch_assoc($sql)) {
        echo '
		<tr>
		<td>' . $no . '</td>
		<td>' . $data['type'] . '</td>
		<td>' . $data['load_mp'] . '</td>
		<td>' . $data['techn_conditions'] . '</td>
		<td>' . $data['name_mp'] . '</td>
		<td>' . $data['requested_roughness'] . '</td>
		<td>' . $data['workpiece'] . '</td>
		<td>' . $data['group_mp'] . '</td>
		<td>' . $data['strength'] . '</td>
		<td>' . $data['hardness_hb'] . '</td>

		</tr>
		';
        $no++;
    }

    ?>
</table>