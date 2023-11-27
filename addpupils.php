<?php

header('Location: pupilsignup.php');
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
    
	#using the hashed_password function for security
    $hashed_password = password_hash($_POST["pupilpassword"], PASSWORD_DEFAULT);
	
	$stmt = $conn->prepare("INSERT INTO tblpupils (pupilID,pupilEmail,pupilPassword,pupilForename,pupilSurname)VALUES (NULL,:pupilemail,:pupilpassword,:pupilforename,:pupilsurname)");
	$stmt->bindParam(':pupilemail', $_POST["pupilemail"]);
    
    $stmt->bindParam(':pupilforename', $_POST["pupilforename"]);
	
	$stmt->bindParam(':pupilpassword', $hashed_password);
	#calling the hashedpassword for security/*  */
  
    $stmt->bindParam(':pupilsurname', $_POST["pupilsurname"]);

	
	$stmt->execute();
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>


