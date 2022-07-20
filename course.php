<?php

$ins=false;
if (isset($_POST['course_Name'])){
    
    include("connection.php");
    // $_SERVER="localhost";
    // $username="root";
    // $password="";

    // $con=mysqli_connect($_SERVER,$username,$password);
    if(!$con){
        die("Connection to this database faild due to".mysqli_connect_error());
    }

    // $dept_id=$_POST['dept_id'];
    $course_Name=$_POST['course_Name'];
    $course_duration=$_POST['course_duration'];
    $inst_id=$_POST['inst_id'];
    $dept_id=$_POST['dept_id'];
    
    


    $sql="INSERT INTO `college`.`course`(`course_Name`, `course_duration`,`inst_id`,`dept_id`) VALUES('$course_Name', '$course_duration','$inst_id','$dept_id')";
    if($con->query($sql)==true){
        // echo"Successfully inserted";
        $ins=true;
        }
    else{
        echo"Error: $sql <br> $con->error";
    }
    $con->close();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <header>
        <div class="title">
            <h1>Course</h1>
            
        </div>
        <div class="title-button">
            <a href="datacourse.php" id="view-btn">View</a>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="left">
           
                
                <form action="course.php" method="post">
                    <h1>Add Course</h1>
                    <label for="">Course Name</label>
                    <input type="text" name="course_Name" id="course_Name" placeholder="Enter Course name">
                    <label for="">Course-duration</label>
                    <input type="text" name="course_duration" id="course_duration" placeholder="Enter Course Duration">
                    <label for="">Instructor ID</label>
                    <input type="number" name="inst_id" id="inst_id" placeholder="Enter Instructor ID">
                    <label for="">Department ID</label>
                    <input type="number" name="dept_id" id="dept_id" placeholder="Enter Department ID">
                    <input type="submit" value="Submit" id="btn">
                    <?php
                        if ($ins==true) {
                            echo'<p>Your details submited succesfully, Thank You</p>';
                        }
                    ?>
                </form>
                
            </div>
            <div class="right">
                <div class="box">
                    <h1>Department Details</h1>
    
                    <?php
                    include("connection.php");
                //         $servername = "localhost";
                //         $username = "root";
                //         $password = "";
                //         $dbname = "college";

                //                             // Create connection
                // $conn = new mysqli($servername, $username, $password, $dbname);
                                            // Check connection
                    if ($con->connect_error) {
                        die("Connection failed: " . $con->connect_error);
                    }

                    $sql = "SELECT dept_id, dept_Name FROM department";
                    $result = $con->query($sql);
                    ?>
                    <table>
                        <tr>
                            <th>Deptarment Id</th>
                            <th> Department</th>
                            <!-- <th>Deptarment Contact No</th> -->
                        </tr>
                        <?php
                    if ($result->num_rows > 0) {
                        echo "
                            <tr>
                                <th align='center'></th>
                                <th align='center'></th>

                            </tr>";
                                    
                        // output data of each row
                        while($row = $result->fetch_assoc()){
                            echo "<tr>  
                                    <td align='center'>" . $row["dept_id"]. "</td>
                                    <td align='center'>" . $row["dept_Name"]. "</td>
                                </tr>";
                        }
                       
                    } 
                    else {
                            echo "0 results";
                    }

                    $con->close();
                ?>
                    </table>
                    
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>Copyright &copy; Deep Ekka</p>
    </footer>
</body>
</html>