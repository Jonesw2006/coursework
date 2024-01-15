<!DOCTYPE HTML>
<!--Declaring what document type this is -->


<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!--Declaring what document type this is -->

<html>
<head>

    <title>Template</title>
    <link rel="stylesheet" href="stylesheet.css" />
</head>
<body>
    <nav class="navbar">

    <div class="logo">LOGO</div>


    <!-- creating the navigation bar-->
    <ul class="navlinks">
        <div class="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="search.php">Search</a></li>

            <li class="tutors">
                
                <a href="tutorspace.php">Tutor Space</a>

                
            </li>

    
            <!-- Sign up and login links -->
            <li><a href="tutorlogin.php">Login</a></li>
            <li><a href="tutorsignup.php">Sign Up</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </div>
    </ul>
    </nav>


    <div class="container">
        <div class="row">
            <h1>Hello, <?php
            session_start();
            $pupilID = $_SESSION["loggedinID"];
            if($_SESSION["loggedinID"]==0){
                header('Location: pupillogin.php');
                //redirects if not signed in 
            }
            

            include_once ("connection.php");
            $name = "SELECT pupilForename FROM tblpupils WHERE pupilID = $pupilID";
            $result = $conn->query($name);

            if ($result->rowCount() > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)){

                    echo $row["pupilForename"];

                }
            }
           
            ?>
            </h1>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <?php
                    include_once ("connection.php");
                    $table = "SELECT *
                    FROM tblsessions JOIN tbltutors ON tblsessions.tutorID = tbltutors.tutorID WHERE tblsessions.pupilID = $pupilID";
                    $result = $conn->query($table);
                    
                    if ($result->rowCount() > 0) {
                        #this sets the table's id 
                        echo "<table border='1' id='sessions'>";
                        #This creates the table titles, for the search table
                        echo "<tr>";
                        echo "<th>Name</th>";
                        echo "<th>Email</th>";
                        echo "<th>Method</th>";
                        echo "<th>Date</th>";
                        echo "<th>Time</th>";
                        echo "</tr>";
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                        
                    #this displays each value for each tutor in the table
        
                        echo "<td>" . $row["tutorForename"] . "</td>";
                        echo "<td>" . $row["tutorEmail"] . "</td>";
                        echo "<td>" . $row["online"] . "</td>";
                        echo "<td>" . $row["sessionDate"] . "</td>";
                        echo "<td>" . $row["sessionTime"] . "</td>";
                        echo "</tr>";
                    
                        }
                        echo "</table>";
                    }

                    else{

                        echo "No Current Bookings";
                    }
                
                ?>
            </div>
            <div class="col-sm-6">
                <?php
                    
                    //$tutorID = $_SESSION['tutorID'];
                    $edit = "SELECT * FROM tblpupils WHERE pupilID = $pupilID";

                    $result = $conn->query($edit);

                    
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    // outputs data the row according to the pupil profile
                        $pupilForename = $row['pupilForename'];
                        $pupilSurname = $row['pupilSurname'];
                        $pupilEmail = $row['pupilEmail'];
                        $pupilPassword = $row['pupilPassword'];
                       
             
                    }

                ?>
                <form action="updatepupil.php" method="post"> 
                    <!--Form links to the updatepupil.php process when posted -->
                    First Name:<input type="text" name="pupilforename" value="<?php echo $pupilForename; ?>"><br>
                    Last Name:<input type="text" name="pupilsurname" value="<?php echo $pupilSurname; ?>"><br>
                    Password:<input type="password" name="pupilpassword" value="<?php echo $pupilPassword; ?>"><br>
                    <!-- using the type password means that it will not be seen by other people on the screen when typing into the interface -->
                    Email:<input type="text" name="pupilemail" value="<?php echo $pupilEmail; ?>"><br>
                    
                    <input type="submit" value="Update Account">
                
                </form>
                
                <form action="deletepupil.php" method="post">
                    <input type="hidden" name="pupilID" value="<?php $pupilID ?>"><br>
                    
                    <input type="submit" value="DELETE ACCOUNT"><br>

                
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <?php
    
    include_once ("connection.php");
    $table = "SELECT * FROM tblreview JOIN tbltutors ON tblreview.tutorID = tbltutors.tutorID WHERE tblreview.pupilID = $pupilID";
    $result = $conn->query($table);
    
    if ($result->rowCount() > 0) {
        #this sets the table's id 
        echo "<table border='1' id='tutors'>";
        #This creates the table titles, for the search table
        echo "<tr>";
        echo "<th>Name of tutor</th>";
        echo "<th>Content</th>";

        echo "<th>Rating</th>";
        echo "<th>Page</th>";
        echo "</tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        
        echo "<tr>";
        
       #this displays each value for each tutor in the table
        echo "<td>" . $row["tutorForename"] . "</td>";
        echo "<td>" . $row["reviewContent"] . "</td>";
        
        echo "<td><img class='image' style='width:100%;' src='rateimg/" . $row["stars"] . ".png" . "'></td>";
        
        #this link sends the user to the tutor profile page while also sending the actual variable
        #of the tutor id so that the user ends up on their desired page
        echo '<td><a href="startsession.php?tutorID=' . $row["tutorID"] . '"> Link to page...</td>';
        echo "</tr>";
        

        


        }
        echo "</table>";
    }
    
    ?>
        </div>



 







</body>


</html>