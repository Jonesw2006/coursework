<?php
session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
print_r($_POST);
$stmt = $conn->prepare("SELECT * FROM tblPupils WHERE pupilemail =:pupilEmail ;");
$stmt->bindParam(':pupilEmail', $_POST['pupilEmail']);
$stmt->execute();





    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $hashed= $row['pupilPassword'];
        $attempt= $_POST['Pword'];
        if(password_verify($attempt,$hashed)){


            $_SESSION['loggedinID']=$row["PupilID"];

            if (!isset($_SESSION['backURL'])){

                $backURL = "home.php";

            
            }else{
                $backURL=$_SESSION['backURL'];
            }


            header('Location: ' . $backURL);
            unset($_SESSION['backURL']);
        }
       
        
}

#if email does not exist then sends back to login page
header('Location: pupillogin.php');
?>