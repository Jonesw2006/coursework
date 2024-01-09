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



    
    <!--using bootstrap to increase readability of page, 04/12/23 - fixed-->                                                                                                                    
    <div class="container">
        <div class="row">
            <h1>Tutor Description</h1>
            <div class="col-sm-6">
                
                <h2>
                    <?php 
                    include_once ("connection.php");
                    session_start();
                    $tutorID = $_SESSION['tutorID'];
                    # getting the tutorID from the get command on the search page
                    
                    #echo $tutorID;
                    $stmt1 = $conn->prepare("SELECT * FROM TblTutors WHERE tutorID =:tutorID ;");
                    $stmt1->bindParam(':tutorID', $tutorID);
                    $stmt1->execute();


                    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
                    {
                    print_r($row["tutorForename"]);

                    echo "\n";
                    #gets the photo which corressponds to the tutorID
                    echo ('<img class="image" src="displaytutorimage.php?tutorID=' . $row['tutorID'] . '" alt="' . $row['tutorID'] . '"><br><br>');
                    print_r($row["tutorDescription"]);

                    #print_r($row["tutorRating"]);
                    #gets the corresponding photo of the amount of stars which the tutor has on their profile
                    echo ('<img class="image" src="rateimg/' . $row['tutorRating'] . '" alt="' . $row['tutorID'] . '"><br><br>');
                    print_r($row["tutorLocation"]);

                    #sends user to the checkout page with the tutors id attached to the link
                    echo '<a class="order" href="checkout.php?tutorID=' . $row["tutorID"] . '"> Book Now!</a>';
                    }
                    ?>
                    <br>
                </br>
            </div>
            <!--divides the page into two -->
            <div class="col-sm-6">            
                <form method="post" action="sendreview.php">
                    <label for="rating">Rating:</label>
                    <!-- required tag means that you have to add a review of at least a rating 1-5 before submitting to avoid spam -->
                    <input type="number" name="stars" min="1" max="5" required> 
                    <label for="text">Comment:</label>
                    <!-- textarea creates a bigger text box to write reviews in order for user to see what they are typing -->
                    <textarea name="reviewContent" rows="3"></textarea>
                    <!-- hidden tutor id sends tutor id with form without being seen -->
                    <input type="hidden" name="tutorID" value="<?php echo $tutorID; ?>">
                    <input type="submit" value="Send Review">
            </div>        
        </h2>
        </div>
    </div>
</body>


</html>