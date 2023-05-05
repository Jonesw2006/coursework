<!DOCTYPE html>
<!--Declaring what document type this is --> 
<html>
<head>

    <title>Sign Up</title>

</head>
<div class="topnav">
    <a class="active" href="home.php">Home</a>
    <a href="pupillogin.php">Login</a>

</div>
<body>




<form action="addpupils.php">
    First Name *:<input type="text" name="pupilForename"><br>
    Last Name *:<input type="text" name="pupilSurname"><br>
    Password *:<input type="password" name="pupilPassword"><br>
    Email *:<input type="text" name="pupilEmail"><br>

    
    <input type="submit" value="Create Account">
    <p></p>
    <!--Sends user to the login page--> 
    Already have an account? <a href="pupillogin.php">Log in</a>
</form>

</body>
</html>