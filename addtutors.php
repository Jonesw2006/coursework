
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try{
	include_once('connection.php');
	$tutorEmail = $_POST["tutoremail"];

	$stmt2 = $conn->prepare("SELECT * FROM tbltutors WHERE tutorEmail = '$tutorEmail' ");
	$stmt2->execute();
	if ($stmt2->rowCount() > 0) {

		echo "Email Already Exists";
		exit();
		
	}

	else{

		$tutorPassword = $_POST["tutorpassword"];
		if (strlen($tutorPassword) > 8) {


			array_map("htmlspecialchars", $_POST);
			// hashed password for security
			$hashed_password = password_hash($tutorPassword, PASSWORD_DEFAULT);
			
			// adding values to tutor table
			$stmt = $conn->prepare("INSERT INTO tbltutors (tutorID, tutorForename, tutorSurname, tutorEmail, tutorPassword, tutorLocation, tutorRating, tutorSubject, tutorDescription, startTime, endTime, image) VALUES (NULL, :tutorforename, :tutorsurname, :tutoremail, :tutorpassword, :tutorlocation, :tutorrating, :tutorsubject, :tutordescription, :starttime, :endtime, :image)");
			
			$stmt->bindParam(':tutorforename', $_POST["tutorforename"]);
			$stmt->bindParam(':tutorsurname', $_POST["tutorsurname"]);
			$stmt->bindParam(':tutoremail', $tutorEmail);
			$stmt->bindParam(':tutorpassword', $hashed_password);
			$stmt->bindParam(':tutorlocation', $_POST["tutorlocation"]);
			$stmt->bindParam(':tutorrating', $_POST["tutorrating"]);

			
			$stmt->bindParam(':tutorsubject', $_POST["tutorsubject"]);
			$stmt->bindParam(':tutordescription', $_POST["tutordescription"]);

			
			$stmt->bindParam(':starttime', $_POST["starttime"]);
			$stmt->bindParam(':endtime', $_POST["endtime"]);
			
			$imageContent = file_get_contents($_FILES["piccy"]["tmp_name"]);
			$stmt->bindParam(':image', $imageContent, PDO::PARAM_LOB);


			
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
		


