<?php

$ins=false;
if (isset($_POST['inst_Name'])){
    
    include("connection.php");
    // $_SERVER="localhost";
    // $username="root";
    // $password="";

    // $con=mysqli_connect($_SERVER,$username,$password);
    if(!$con){
        die("Connection to this database faild due to".mysqli_connect_error());
    }

    // $dept_id=$_POST['dept_id'];

    $inst_Name=$_POST['inst_Name'];
    $inst_Cont_No=$_POST['inst_Cont_No'];
    $dept_id=$_POST['dept_id'];

    $sql="INSERT INTO `college`.`instructor`(`inst_Name`, `inst_Cont_No`,`dept_id`) VALUES('$inst_Name', '$inst_Cont_No','$dept_id')";
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
            <h1>Instructor</h1>
            
        </div>
        <div class="title-button">
            <a href="datainst.php" id="view-btn">View</a>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="left">
            
                
                <form action="instructor.php" method="POST">
                    <h1>Add Instructor</h1>
                    <label for="">Instructor Name</label>
                    <input type="text" name="inst_Name" id="Inst_Name" placeholder="Enter Instructor Name">

                    <label for="">Instructor Contact No</label>
                    <input type="phone" name="inst_Cont_No" id="inst_Cont_No" placeholder="Enter Contact Number">

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
                            <th>Deptarment</th>
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