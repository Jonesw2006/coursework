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

    <form action="order.php" method="post"> 
    <!--Form links to the order.php process when posted -->
    Session Date:<input type="date" name="sessiondate"><br>
    Session Time:<input type="time" name="sessiontime" step="1"><br>
    Address Line 1 *:<input type="text" name="addressline1"><br>
    Address Line 2 *:<input type="text" name="addressline2"><br>
    Address Line 3 *:<input type="text" name="addressline3"><br>
    Postcode *:<input type="text" name="postcode"><br>
    

    
    Method:<input type="text" name="online"><br>
    
    <p></p>
    <input type="submit" value="Create Booking">
    
















</body>


</html>