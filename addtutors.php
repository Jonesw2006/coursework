
<?php
header('Location:tutorsignup.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);

	#using the hashed_password function for security
    $hashed_password = password_hash($_POST["tutorpassword"], PASSWORD_DEFAULT);

	# adding values to tutor table
	$stmt = $conn->prepare("INSERT INTO TblTutors (tutorID,tutorForename,tutorSurname,tutorEmail,tutorPassword,tutorLocation,tutorSubject,tutorDescription,Image,tutorRating)VALUES (NULL,:tutorforename,:tutorsurname,:tutoremail,:tutorpassword,:tutorlocation,:tutorsubject,:tutordescription,:pic,NULL)");


	$stmt->bindParam(':tutorsubject', $_POST["tutorSubject"]);
	$stmt->bindParam(':tutorID', $_POST["tutorID"]);
	$stmt->bindParam(':tutorsurname', $_POST["tutorSurname"]);
	$stmt->bindParam(':tutoremail', $_POST["tutorSurname"]);
	$stmt->bindParam(':tutorpassword', $hashed_password);
	$stmt->bindParam(':tutorlocation', $_POST["tutorLocation"]);
	$stmt->bindParam(':tutorsubject', $_POST["tutorSubject"]);
	$stmt->bindParam(':tutordescription', $_POST["tutorDescription"]);
	$stmt->bindParam(':pic', $_FILES["piccy"]["name"]);
	

	$stmt->execute();
	#uploading an image process
	$target_dir = "images/";
	print_r($_FILES);
	$target_file = $target_dir . basename($_FILES["piccy"]["name"]);
	echo $target_file;
	$uploadOK = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	# lets user know if file has been uploaded or not
	if (move_uploaded_file($_FILES["piccy"]["tmp_name"], $target_file)) {
		echo "File ". htmlspecialchars( basename( $_FILES["piccy"]["name"])). " has been uploaded.";

	} else {
		echo "An Error Occured";
	}
	
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
} 
$conn=null;
?>

