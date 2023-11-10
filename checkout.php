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
            # getting the tutorID from the get command on the search page
            $tutorID = ($_GET["tutorID"]);
            #echo $tutorID;
            $stmt1 = $conn->prepare("SELECT * FROM TblTutors WHERE tutorID =:tutorID ;");
            $stmt1->bindParam(':tutorID', $tutorID);
            $stmt1->execute();


            while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
            {

                print_r($row["tutorForename"]);
            }



        ?>













</body>


</html>