<table border="1" >
    <h1>Sales Vs Target Report</h1>
    <tr bgcolor="green">
        <th>Client</th>
        <th>Year</th>
        <th>Month</th>
        <th>Target Value</th>
        <th>Sales Value</th>
        <th>% Deviation</th>
    </tr>

    <?php
    ini_set('display_errors', 0);
    include '../config/database.php';

    $mysqli = new mysqli('localhost', 'root', '1234','ilptcrm');

    $res = "";
    $query_target = "SELECT client , year , month , target FROM ilptcrm_target;";
    $result_target = $mysqli->query($query_target);

    if ($result_target->num_rows > 0) {
        while ($data_sales_target = $result_target->fetch_assoc())
        {
         //   $query_sales = "SELECT client , sum(value_s) as sales_sum FROM ilptcrm.ilptcrm_booksales WHERE DATE(created_date_time) >= '". $_POST['from_date']. "' and  DATE(created_date_time) <= ". $_POST['to_date'] ." and client = '" . $data_sales_target['client'] . "'";
            $query_sales = "SELECT client , sum(value_s) as sales_sum FROM ilptcrm_booksales WHERE client = '" . $data_sales_target['client'] . "'";
            $result_sales = $mysqli->query($query_sales);
            if ($result_sales->num_rows > 0) {
                $res = $res . '<tr bgcolor=#7fffd4> 
                <td>' . $data_sales_target['client'] . '</td>
                <td> ' . $data_sales_target['year'] . '</td>        
                <td> ' . $data_sales_target['month'] . '</td>
                <td> ' . $data_sales_target['target'] . '</td>';
                while ($data_sales = $result_sales->fetch_assoc()) {
                    $res = $res . '<td> ' . $data_sales['sales_sum'] . '</td> ';
                    $diviation_per = ($data_sales_target['target'] - $data_sales['sales_sum']) / $data_sales_target['target'] * 100;
                    $res = $res . '<td> ' . $diviation_per . '</td></tr> ';
                }
            }

        }
    }

    echo $res;
    $mysqli->close();
    ?>
</table>