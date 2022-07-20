<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Data</title>
    <link rel="stylesheet" href="datatable.css">


</head>
<body>
<h1 style="text-align:center;text-transform:uppercase; background-color: white;" >instructor</h1>


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

// $sql = "SELECT inst_id, inst_Name, inst_Cont_No, dept_id FROM instructor";
$sql="SELECT * FROM instructor INNER JOIN department on instructor.dept_id=department.dept_id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<table width='70%' align='center' >
            <tr><th style='text-align:center;'>Instructor ID</th>
                <th style='text-align:center;'>Instructor Name</th>
                <th style='text-align:center;'>Instructor Contact</th>
                <th style='text-align:center;'>Department ID</th>
                <th style='text-align:center;'>Department</th>

            </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr> 
                    <td  style='text-align:center;'>" . $row["inst_id"]. "</td>
                    <td  style='text-align:center;'>" . $row["inst_Name"]. "</td>
                    <td  style='text-align:center;'>" . $row["inst_Cont_No"]. "</td>
                    <td  style='text-align:center;'>" . $row["dept_id"]. "</td>
                    <td  style='text-align:center;'>" . $row["dept_Name"]. "</td>

                    
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