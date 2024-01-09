
<?php
header('Location: tutorsignup.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
	// hashed password for security
	$hashed_password = password_hash($_POST["tutorpassword"], PASSWORD_DEFAULT);
	
	// adding values to tutor table
	$stmt = $conn->prepare("INSERT INTO tbltutors (tutorID, tutorForename, tutorSurname, tutorEmail, tutorPassword, tutorLocation, tutorRating, tutorSubject, tutorDescription, image) VALUES (NULL, :tutorforename, :tutorsurname, :tutoremail, :tutorpassword, :tutorlocation, NULL, :tutorsubject, :tutordescription, :image)");
	
	$stmt->bindParam(':tutorforename', $_POST["tutorforename"]);
	$stmt->bindParam(':tutorsurname', $_POST["tutorsurname"]);
	$stmt->bindParam(':tutoremail', $_POST["tutoremail"]);
	$stmt->bindParam(':tutorpassword', $hashed_password);
	$stmt->bindParam(':tutorlocation', $_POST["tutorlocation"]);
	$stmt->bindParam(':tutorsubject', $_POST["tutorsubject"]);
	$stmt->bindParam(':tutordescription', $_POST["tutordescription"]);
	
	$imageContent = file_get_contents($_FILES["piccy"]["tmp_name"]);
	$stmt->bindParam(':image', $imageContent, PDO::PARAM_LOB);
	
	$stmt->execute();
	}
	catch(PDOException $e)
	{
    	echo "error".$e->getMessage();
	}
	$conn=null;
?>
		


