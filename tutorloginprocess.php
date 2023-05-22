<?php
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM TblTutors WHERE tutorEmail =:tutorEmail ;");
$stmt->bindParam(':tutorEmail', $_POST['tutorEmail']);
$stmt->execute();





    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
       
        if($row['tutorPassword']== $_POST['tutorPassword']){
            #sends user to their profile page when both feilds are entered correctly
            header('Location: tutorprofile.php');
            
        }else{
            #if password is wrong then sends back to login page
            header('Location: tutorlogin.php');
            
        }
}


#if email does not exist then sends back to login page
header('Location: tutorlogin.php');
?>