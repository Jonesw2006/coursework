<!DOCTYPE HTML>
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
            <li><a href="pupillogin.php">Login</a></li>
            <li><a href="pupilsignup.php">Sign Up</a></li>
        </div>
    </ul>
    </nav>
    <?php
    include_once ("connection.php");
    $table = "SELECT * FROM tbltutors";
    $result = $conn->query($table);

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo "<table border='1'>";

        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Location</th>";
        echo "<th>Rating</th>";
        echo "<th>Subject</th>";
        echo "</tr>";

        
        echo "<tr>";
        echo "<td>" . $row["tutorForename"] . "</td>";
        echo "<td>" . $row["tutorLocation"] . "</td>";
        echo "<td>" . $row["tutorRating"] . "</td>";
        echo "<td>" . $row["tutorSubject"] . "</td>";
        echo "</tr>";
        

        echo "</table>";


        }
    }
    
    ?>













</body>


</html>