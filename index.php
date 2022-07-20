<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEEP EKKA</title>
    <link rel="stylesheet" href="index.css">
    <!-- <link rel="stylesheet" href="utils.css"> -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
</head>

<body>
    <header>
        <nav>
            <div class="logo">DBMS</div>
            <input type="checkbox" name="" id="click">
            <label for="click" class="menu-btn"> 
                <i class='fas fa-bars'></i>
            </label>
            <ul>
                <li><a class="active" href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Help</a></li>
            </ul>

        </nav>
    </header>

    <main>
        <div class="container">
            <div class="left">
                <div class="box">
                    <div class="box-box1">
                        <h1>Welcome</h1>
                        <h2>Database Management System for <br> Department</h2>
                        <br>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, voluptas voluptatum. Facilis fugiat incidunt ipsa quae et consequuntur architecto sequi doloribus placeat, quas obcaecati tempora? Mollitia nemo saepe aliquid harum.</p>
                    </div>
                    <div class="box-box2">
                        <ul>
                            <li><a href="dept.php" target="_blank">Department</a></li>
                            <li><a href="course.php" target="_blank">Course</a></li>
                            <li><a href="instructor.php" target="_blank">Instructor</a></li>
                            <li><a href="student.php" target="_blank">Student</a></li>
                            <li><a href="enrolled.php" target="_blank">Enrolled</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="right">
                <div class="card" id="card">
                    <div class="front">
                        <h1>Department</h1>
                        <div class="front-box">

                                <?php
                                    include("connection.php");

                                    // $servername = "localhost";
                                    // $username = "root";
                                    // $password = "";
                                    // $dbname = "college";
            
                                    //                     // Create connection
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
                                        <th>Department ID</th>
                                        <th>Department</th>
                                    </tr>
                                </table>
                                <marquee behavior="scroll" direction="up">
                                <table>
                                    <tr>
                                        <th width=45%></th>
                                        <th width=55%></th>
                                        
                                    </tr>
                                    
                                <?php
                                    if ($result->num_rows > 0) {
                                  
                                    // output data of each row
                                    while($row = $result->fetch_assoc()){
                                        echo "<tr>  
                                                <td >" . $row["dept_id"]. "</td>
                                                <td >" . $row["dept_Name"]. "</td>
                                            </tr>";
                                    }
                                   
                                } 
                                else {
                                        echo "0 results";
                                }
            
                            
                            ?>
                                </table>
                                </marquee>
                            
                        </div>
                    </div>
                    <div class="back">
                        <h1>Course</h1>
                        <div class="back-box">
                                <?php
                                if ($con->connect_error) {
                                    die("Connection failed: " . $con->connect_error);
                                }
        
                            $sql = "SELECT course_id, course_Name FROM course";
                            $result = $con->query($sql);
                            ?>
                            <table>
                                <tr>
                                    <th>Course ID</th>
                                    <th>Course</th>
                                </tr>
                            </table>
                            <marquee behavior="scroll" direction="up">
                            <table>
                                <tr>
                                    <th width=45%></th>
                                    <th width=55%></th>
                                    
                                </tr>
                                
                            <?php
                                if ($result->num_rows > 0) {
                              
                                // output data of each row
                                while($row = $result->fetch_assoc()){
                                    echo "<tr>  
                                            <td >" . $row["course_id"]. "</td>
                                            <td >" . $row["course_Name"]. "</td>
                                        </tr>";
                                }
                               
                            } 
                            else {
                                    echo "0 results";
                            }
                            $con->close();
                        
                        ?>
                            </table>
                            </marquee>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <footer class="flex-all-center">
        <p>Copyright &copy; Deep Ekka, All Rights Reserved</p>
    </footer>
</body>

</html>