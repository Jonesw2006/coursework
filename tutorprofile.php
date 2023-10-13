<!DOCTYPE HTML>

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

    <div class="logo">TutorSpace</div>


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



    
                                                                                                                        

    <div class="col-sm-4">
        <h2>
            <?php 
            include_once ("connection.php");
            # getting the tutorID from the get command on the search page
            $tutorID = ($_GET["tutorID"]);
            #echo $tutorID;
            $stmt1 = $conn->prepare("SELECT * FROM TblTutors WHERE tutorID =:tutorID ;");
            $stmt1->bindParam(':tutorID', $tutorID);
            $stmt1->execute();


            while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
            {
            print_r($row["tutorForename"]);
            


            #gets the photo which corressponds to the tutorID
            
            
            
            

            echo ('<img class="image" src="images/' . $row['image'] . '" alt="' . $row['tutorID'] . '"><br><br>');
            print_r($row["tutorDescription"]);
            print_r($row["tutorRating"]);
            print_r($row["tutorLocation"]);
            }

        
            ?>




            
        </h2>
    </div>
    

<footer>
    <h4>Author: Will Jones │ Oundle School </h4>
</footer>

</body>


</html>