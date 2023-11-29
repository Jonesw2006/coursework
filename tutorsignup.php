<!DOCTYPE html>
<!--Declaring what document type this is --> 
<html>
<head>

    <title>Tutor Sign Up</title>
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
<form action="addtutors.php" method="post" enctype="multipart/form-data"> <!-- the enctype ensures that files can be uploaded --> 
    <!--Form links to the addpupils.php process when posted -->
    First Name *:<input type="text" name="tutorforename"><br>
    Last Name *:<input type="text" name="tutorsurname"><br>
    Password *:<input type="password" name="tutorpassword"><br>
    <!-- using the type password means that it will not be seen by other people on the screen when typing into the interface -->
    Email *:<input type="text" name="tutoremail"><br>
    Image: <input type="file" id="piccy" name="piccy" accept="image/*"><br>

    
    <input type="submit" value="Create Account">
    <p></p>
    <!--Sends user to the login page--> 
    Already have a tutor account? <a href="tutorlogin.php">Log in</a>
    <p> </p>
    <!--sends any tutor to the tutor login space instead -->
    
</form>



</body>
</html>
