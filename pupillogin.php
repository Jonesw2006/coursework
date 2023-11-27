<!DOCTYPE html>
<!--Declaring what document type this is --> 
<html>
<head>

    <title>Login</title>
    <!-- Linking the CSS style sheet-->
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

        

            
            <!-- Sign up link as login link removed as it is the page the user is currently on -->
            
            <li><a href="pupilsignup.php">Sign Up</a></li>
        </div>
    </ul>
    </nav>




<form action="loginprocess.php" method= "POST">
    Email:<input type="text" name="pupilEmail"><br>
    Password:<input type="password" name="Pword"><br>
    
    
    <input type="submit" value="Login">
    <p></p>
    <!--Sends user to the sign up page--> 
    Don't have an account? <a href="pupilsignup.php">Sign up</a>
</form>

</body>
</html>