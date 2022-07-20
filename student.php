<?php

$ins=false;
if (isset($_POST['stu_Name'])){
    
    include("connection.php");
    // $_SERVER="localhost";
    // $username="root";
    // $password="";

    // $con=mysqli_connect($_SERVER,$username,$password);
    if(!$con){
        die("Connection to this database faild due to".mysqli_connect_error());
    }

    // $dept_id=$_POST['dept_id'];

    $stu_Name=$_POST['stu_Name'];
    $stu_DOB=$_POST['stu_DOB'];
    $stu_emailID=$_POST['stu_emailID'];

    $sql="INSERT INTO `college`.`student`(`stu_Name`, `stu_DOB`,`stu_emailID`) VALUES('$stu_Name', '$stu_DOB','$stu_emailID')";
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
            <h1>Student</h1>
            
        </div>
        <div class="title-button">
            <a href="datastu.php" id="view-btn">View</a>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="left">
            
                <form action="student.php" method="POST">
                    <h1>Add Student</h1>
                    <label for="">Name</label>
                    <input type="text" name="stu_Name" id="stu_Name" placeholder="Enter Student Name">

                    <label for="">Date of Birth</label>
                    <input type="Date" name="stu_DOB" id="stu_DOB" placeholder="Enter Date of Birth">

                    <label for="">Email ID</label>
                    <input type="email" name="stu_emailID" id="stu_emailID" placeholder="Enter Email ID">
                    <input type="submit" value="Submit" id="btn">
                    <?php
                    if ($ins==true) {
                    echo'<p>Your details submited succesfully, Thank You</p>';
                        }
                    ?>
                </form>
                
                
            </div>
            <!-- <div class="right">
                <div class="box">
                    <h1>Table</h1>
                    <table>
                        <tr>
                            <th>Deptarment Id</th>
                            <th>Deptarment Name</th>
                            
                        </tr>
                    </table>
                </div>
            </div> -->
        </div>
    </main>
    <footer>
        <p>Copyright &copy; Deep Ekka</p>
    </footer>
</body>
</html>