<!DOCTYPE html>
<!--Declaring what document type this is --> 
<html>
<head>

    <title>Login</title>

</head>
<div class="topnav">
    <a class="active" href="home.php">Home</a>
    
    <a href="pupilsignup.php">Sign Up</a>

</div>
<body>




<form action="loginprocess.php" method= "POST">
    Email:<input type="text" name="pupilEmail"><br>
    Password:<input type="password" name="pupilPassword"><br>
    
    
    <input type="submit" value="Login">
    <p></p>
    <!--Sends user to the sign up page--> 
    Don't have an account? <a href="pupilsignup.php">Sign up</a>
</form>

</body>
</html>