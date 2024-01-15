<?php
session_start();
$pupilID = $_SESSION['pupilID'];
header('Location: pupilprofile.php');

try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
    

    $pupilForename = $_POST['pupilforename'];
    $pupilSurname = $_POST['pupilsurname'];
    $pupilEmail = $_POST['pupilemail'];
    $pupilPassword = $_POST['pupilpassword'];
    $hashed_password = password_hash($_POST["tutorpassword"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE tblpupils SET pupilForename = '$pupilForename', pupilSurname = '$pupilSurname', pupilEmail = '$pupilEmail'
    , pupilPassword = '$hashed_password' WHERE pupilID = '$pupilID'");

    $stmt->bindParam(':pupilforename', $pupilForename);
    $stmt->bindParam(':pupilsurname', $pupilSurname);
    $stmt->bindParam(':pupilemail', $pupilEmail);
    $stmt->bindParam(':pupilpassword', $hashed_password);
        
    $stmt->execute();
       
    }
    
catch(PDOException $e)
	{
    	echo "error".$e->getMessage();
	}

?>