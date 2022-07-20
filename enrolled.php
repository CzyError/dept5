<?php

$ins=false;
if (isset($_POST['stu_id'])){
    
    include("connection.php");
    // $_SERVER="localhost";
    // $username="root";
    // $password="";

    // $con=mysqli_connect($_SERVER,$username,$password);
    if(!$con){
        die("Connection to this database faild due to".mysqli_connect_error());
    }

    // $dept_id=$_POST['dept_id'];
    $stu_id=$_POST['stu_id'];
    $course_id=$_POST['course_id'];
    
    $sql="INSERT INTO `college`.`enrolled_students`(`stu_id`, `course_id`) VALUES('$stu_id', '$course_id')";
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
            <h1>Enrolled Students</h1>
            
        </div>
        <div class="title-button">
            <a href="dataenroll.php" id="view-btn">View</a>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="left">
           
                <form action="enrolled.php" method="post">
                    <h1>Add Enrolled Student</h1>
                    <label for="">Student ID</label>
                    <input type="number" name="stu_id" id="stu_id" placeholder="Enter Student ID">
                    <label for="">Course ID</label>
                    <input type="number" name="course_id" id="course_id" placeholder="Enter Course ID">
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
                    <h1>Course Details</h1>
                    

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

                    $sql = "SELECT course_id, course_Name FROM course";
                    $result = $con->query($sql);
                    ?>
                    <table>
                        <tr>
                            <th>Course ID</th>
                            <th>Course Name</th>
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
                                    <td align='center'>" . $row["course_id"]. "</td>
                                    <td align='center'>" . $row["course_Name"]. "</td>
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