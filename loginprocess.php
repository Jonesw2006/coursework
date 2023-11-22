<?php
session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblPupils WHERE pupilemail =:pupilemail ;");
$stmt->bindParam(':pupilemail', $_POST['pupilEmail']);
$stmt->execute();





    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
       
        if($row['pupilPassword']== $_POST['pupilPassword']){
            #sends user to their profile page when both feilds are entered correctly
            header('Location: pupilprofile.php');
            
        }else{
            #if password is wrong then sends back to login page
            header('Location: pupillogin.php');
            
        }
}


#if email does not exist then sends back to login page
header('Location: pupillogin.php');
?>