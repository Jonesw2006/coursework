<?php


ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try{
	include_once('connection.php');
	$pupilEmail = $_POST["pupilemail"];
	$stmt2 = $conn->prepare("SELECT * FROM tblpupils WHERE pupilEmail = '$pupilEmail'");
	$stmt2->execute();
	if ($stmt2->rowCount() > 0) {

		echo "<script type='text/javascript'>alert('Email Already Exists');</script>";

		
	}

	else{

		$pupilPassword = $_POST["pupilpassword"];
		if (strlen($pupilPassword) > 8) {
			array_map("htmlspecialchars", $_POST);
			
			#using the hashed_password function for security
			$hashed_password = password_hash($_POST["pupilpassword"], PASSWORD_DEFAULT);
			
			$stmt = $conn->prepare("INSERT INTO tblpupils (pupilID,pupilEmail,pupilPassword,pupilForename,pupilSurname)VALUES (NULL,:pupilemail,:pupilpassword,:pupilforename,:pupilsurname)");
			$stmt->bindParam(':pupilemail', $pupilEmail);
			
			$stmt->bindParam(':pupilforename', $_POST["pupilforename"]);
			
			$stmt->bindParam(':pupilpassword', $hashed_password);
			#calling the hashedpassword for security
		
			$stmt->bindParam(':pupilsurname', $_POST["pupilsurname"]);

			
			$stmt->execute();
			header('Location: home.php');
		}
		else {
			echo "Stronger Password Needed";
		}
	}
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>


