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

    <a href="tutorlogin.php">Login</a>
    <a href="tutorsignup.php">Sign Up</a>

    <div class="container">
        <div class="row">
            <h1>Hello, <?php
            session_start();
            if($_SESSION["tutorloggedinID"]==0){
                header('Location: tutorlogin.php');
                //redirects if not signed in 
            }
            $tutorlogID = $_SESSION['tutorloggedinID'];

            include_once ("connection.php");
            $name = "SELECT tutorForename FROM tbltutors WHERE tutorID = $tutorlogID";
            $result = $conn->query($name);

            if ($result->rowCount() > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)){

                    echo $row["tutorForename"];

                }
            }
           
            ?>
            </h1>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <?php
                    include_once ("connection.php");
                    $table = "SELECT tblsessions.pupilID,tblsessions.addressLine1,tblsessions.addressLine2,tblsessions.addressLine3,
                    tblsessions.postcode,tblsessions.online, tblsessions.sessionDate, tblsessions.sessionTime, tblpupils.pupilForename,tblpupils.pupilEmail 
                    FROM tblsessions JOIN tblpupils ON tblsessions.pupilID = tblpupils.pupilID WHERE tblsessions.tutorID = $tutorlogID";
                    $result = $conn->query($table);
                    
                    if ($result->rowCount() > 0) {
                        #this sets the table's id 
                        echo "<table border='1' id='sessions'>";
                        #This creates the table titles, for the search table
                        echo "<tr>";
                        echo "<th>Name</th>";
                        echo "<th>Email</th>";
                        echo "<th>Location</th>";
                        echo "<th>Postcode</th>";
                        echo "<th>Method</th>";
                        echo "<th>Date</th>";
                        echo "<th>Time</th>";
                        echo "</tr>";
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                        
                        
                        echo "<tr>";
                        
                    #this displays each value for each tutor in the table
                        echo "<td>" . $row["pupilID"] . "</td>";
                        echo "<td>" . $row["pupilForename"] . "</td>";
                        echo "<td>" . $row["addressLine1"] . $row["addressLine3"] . $row["addressLine3"] . "</td>";
                        
                        echo "<td>" . $row["postcode"] . "</td>";
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
                    $edit = "SELECT * FROM tbltutors WHERE tutorID = $tutorlogID";

                    $result = $conn->query($edit);

                    
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    // outputs data the row according to the tutor profile
                        $tutorForename = $row['tutorForename'];
                        $tutorSurname = $row['tutorSurname'];
                        $tutorEmail = $row['tutorEmail'];
                        $tutorPassword = $row['tutorPassword'];
                        $tutorLocation = $row['tutorLocation'];
                        $tutorSubject = $row['tutorSubject'];
                        $tutorDescription = $row['tutorDescription'];
                        $startTime = $row['startTime'];
                        $endTime = $row['endTime'];
                        $image = $row['image'];
             
                    }




                ?>
                <form action="updatetutor.php" method="post" enctype="multipart/form-data"> 
                    <!--Form links to the addpupils.php process when posted -->
                    First Name:<input type="text" name="tutorforename" value="<?php echo $tutorForename; ?>"><br>
                    Last Name:<input type="text" name="tutorsurname" value="<?php echo $tutorSurname; ?>"><br>
                    Password:<input type="password" name="tutorpassword" value="<?php echo $tutorPassword; ?>"><br>
                    <!-- using the type password means that it will not be seen by other people on the screen when typing into the interface -->
                    Email:<input type="text" name="tutoremail" value="<?php echo $tutorEmail; ?>"><br>
                    Location:<input type="text" name="tutorlocation" value="<?php echo $tutorLocation; ?>"><br>
                    Description:<input type="text" name="tutordescription" value="<?php echo $tutorDescription; ?>"><br>
                    Subject:<input type="text" name="tutorsubject" value="<?php echo $tutorSubject; ?>"><br>
                    
                    
                    Start Time:<input type="time" name="starttime" value="<?php echo $startTime; ?>"><br>
                    End Time:<input type="time" name="endtime" value="<?php echo $endTime; ?>"><br>  


                    
                    <input type="submit" value="Update Account">
                
                </form>
                
                <form action="deletetutor.php" method="post">
                    <input type="hidden" name="tutorid" value="<?php $tutorlogID ?>"><br>
                    
                    <input type="submit" value="DELETE ACCOUNT"><br>

                
                </form>

            </div>
        </div>



 







</body>


</html>