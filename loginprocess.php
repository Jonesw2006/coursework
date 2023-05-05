<?php
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM TblPupils WHERE pupilEmail =:pupilEmail ;");
$stmt->bindParam(':pupilEmail', $_POST['pupilEmail']);
$stmt->execute();
#does pupil exist?
// $result = $conn->prepare("SELECT * FROM TblPupils WHERE pupilEmail=:pupilEmail ;");
// if($result->num_rows == 0){
//     header('Location: pupilLogin.php');
 
//     }

// else {

//     while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
//     {
       
//         if($row['pupilPassword']== $_POST['pupilPassword']){
//             header('Location: home.php');
            
//         }else{
    
//             header('Location: pupillogin.php');
            
//         }
// }

// }

// $conn=null;
?>