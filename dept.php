<?php

$ins=false;
if (isset($_POST['dept_Name'])){
    
    // $_SERVER="localhost";
    // $username="root";
    // $password="";


    // $con=mysqli_connect($_SERVER,$username,$password);
    include("connection.php");

    
    if(!$con){
        die("Connection to this database faild due to".mysqli_connect_error());
    }
    ?>
<?php
    // $dept_id=$_POST['dept_id'];
    $dept_Name=$_POST['dept_Name'];
    $dept_Cont_No=$_POST['dept_Cont_No'];
    
    $sql="INSERT INTO `college`.`department`(`dept_Name`, `dept_Cont_No`) VALUES('$dept_Name', '$dept_Cont_No')";
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
            <h1>DEPARTMENT</h1>
        </div>
        <div class="mid">
           
        </div>
        <div class="title-button">
            <a href="datadept.php" id="view-btn">View</a>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="left">
            
                <form action="dept.php" method="post">
                    <h1>ADD DEPARTMENT</h1>
                    <!-- <label for="">Department ID</label>
                    <input type="number" name="dept_id" id="dept_id"> -->
                    <label for="">Department Name</label>
                    <input type="text" name="dept_Name" id="dept_Name">
                    <label for="">Department Contact No.</label>
                    <input type="number" name="dept_Cont_No" id="dept_Cont_No">
                    
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
                
                    <h1>Table</h1>
                    

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
                            <th>Deptarment Name</th>
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