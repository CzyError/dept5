<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Data</title>
    <link rel="stylesheet" href="datatable.css">


</head>
<body>
<h1 style="text-align:center;text-transform:uppercase; background-color: white;" >Department</h1>
<?php
include("connection.php");

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "college";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT dept_id, dept_Name, dept_Cont_No FROM department";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<table width='70%' align='center' >
            <tr><th style='text-align:center;'>ID</th>
                <th style='text-align:center;'>Name</th>
                <th style='text-align:center;'>Contact</th>
            </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>  <td  style='text-align:center;'>" . $row["dept_id"]. "</td>
                    <td  style='text-align:center;'>" . $row["dept_Name"]. "</td>
                    <td  style='text-align:center;'>" . $row["dept_Cont_No"]. "</td>
                </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$con->close();
?>

</body>
</html>