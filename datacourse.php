<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Data</title>
    <link rel="stylesheet" href="datatable.css">


</head>
<body>
<h1 style="text-align:center;text-transform:uppercase; background-color: white;" >Course</h1>
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

// $sql = "SELECT course_id, course_Name, course_duration, inst_id, dept_id FROM course";
$sql="SELECT * FROM course INNER JOIN instructor on course.inst_id=instructor.inst_id INNER JOIN department ON instructor.dept_id=department.dept_id ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<table width='70%' align='center' >
            <tr>
            <th style='text-align:center;'>Course ID</th>
                <th style='text-align:center;'>Course Name</th>
                <th style='text-align:center;'>Course Duration</th>

                <th style='text-align:center;'>Instructor ID</th>
                <th style='text-align:center;'>Instructor Name</th>

                <th style='text-align:center;'>Department ID</th>
                <th style='text-align:center;'>Department</th>


            </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>  <td  style='text-align:center;'>" . $row["course_id"]. "</td>
                    <td  style='text-align:center;'>" . $row["course_Name"]. "</td>
                    <td  style='text-align:center;'>" . $row["course_duration"]. "</td>
                    <td  style='text-align:center;'>" . $row["inst_id"]. "</td>
                    <td  style='text-align:center;'>" . $row["inst_Name"]. "</td>

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