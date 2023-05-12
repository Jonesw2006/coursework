<!DOCTYPE html>
<!--Declaring what document type this is --> 
<html>
<head>

    <title>Sign Up</title>
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
            
        </div>
    </ul>
    </nav>



<!--login process -->
<form action="addpupils.php">
    First Name *:<input type="text" name="pupilForename"><br>
    Last Name *:<input type="text" name="pupilSurname"><br>
    Password *:<input type="password" name="pupilPassword"><br>
    Email *:<input type="text" name="pupilEmail"><br>

    
    <input type="submit" value="Create Account">
    <p></p>
    <!--Sends user to the login page--> 
    Already have an account? <a href="pupillogin.php">Log in</a>
    <p> </p>
    <!--sends any tutor to the tutor login space instead -->
    Are you a tutor? <a href="tutorspace.php">Visit Tutor Space</a>
</form>

</body>
</html>