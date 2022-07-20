<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrolled Data</title>
    <link rel="stylesheet" href="datatable.css">


<!-- <style>
    table{
        background-color: white;
    }
table, th, td {
    border: 1px solid black;
}

body{
    background-color: #00ffc8;
}
</style> -->
</head>
<body>
<h1 style="text-align:center;text-transform:uppercase; background-color: white;" >Student</h1>
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

// $sql = "SELECT * from enrolled_students INNER JOIN student on enrolled_students.stu_id=student.stu_id INNER JOIN course on enrolled_students.course_id=course.course_id;";
$sql = "SELECT * from enrolled_students INNER JOIN student on enrolled_students.stu_id=student.stu_id INNER JOIN course on enrolled_students.course_id=course.course_id INNER JOIN instructor ON course.inst_id=instructor.inst_id INNER join department ON instructor.dept_id=department.dept_id;";
// SELECT * from enrolled_students INNER JOIN course on enrolled_students.course_id=course.course_id;
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<table align='center'>
            <tr><th style='text-align:center;'>Student ID</th>
                <th style='text-align:center;'>Student Name</th>
                <th style='text-align:center;'>Student Date of Birth</th>
                <th style='text-align:center;'>Email Id</th>
                <th style='text-align:center;'>Course ID</th>
                <th style='text-align:center;'>Course</th>
                <th style='text-align:center;'>Course Duration</th>

                <th style='text-align:center;'>Instructor ID</th>
                <th style='text-align:center;'>Instructor Name</th>

                <th style='text-align:center;'>Department ID</th>
                <th style='text-align:center;'>Department</th>
               



            </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr> 
                    <td  style='text-align:center;'>" . $row["stu_id"]. "</td>
                    <td  style='text-align:center;'>" . $row["stu_Name"]. "</td>
                    <td  style='text-align:center;'>" . $row["stu_DOB"]. "</td>
                    <td  style='text-align:center;'>" . $row["stu_emailID"]. "</td>
                    <td  style='text-align:center;'>" . $row["course_id"]. "</td>
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