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
        </div>
    </ul>
    </nav>


    <a href="tutorlogin.php">Login</a>
    <a href="tutorsignup.php">Sign Up</a>




    <div class="container">
        <div class="row">
            <h1>Hello, </h1>
            <div class="col-sm-6">
            <?php
    
    include_once ("connection.php");
    $table = "SELECT * FROM tblsessions";
    $result = $conn->query($table);
    
    if ($result->rowCount() > 0) {
        #this sets the table's id 
        echo "<table border='1' id='sessions'>";
        #This creates the table titles, for the search table
        echo "<tr>";
        echo "<th>Name</th>";
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
        echo "<td>" . $row["addressLine1"] . $row["addressLine3"] . $row["addressLine3"] . "</td>";
        
        echo "<td>" . $row["postcode"] . "</td>";
        echo "<td>" . $row["online"] . "</td>";
        echo "<td>" . $row["sessionDate"] . "</td>";
        echo "<td>" . $row["sessionTime"] . "</td>";
       
        echo "</tr>";
        

        


        }
        echo "</table>";
    }
    
    ?>











</body>


</html>