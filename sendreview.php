<?php
header('Location:tutorprofile.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);

	
   

	# adding review values to tutor table
	$stmt = $conn->prepare("INSERT INTO TblReview (reviewID, tutorID, pupilID, stars, reviewContent)VALUES (NULL, :tutorID, :pupilID, :stars, :reviewcontent)");


	$stmt->bindParam(':tutorID', $_POST["tutorID"]);
    $stmt->bindParam(':pupilID', $_POST["pupilID"]);
    $stmt->bindParam(':stars', $_POST["stars"]);
    $stmt->bindParam(':reviewcontent', $_POST["reviewcontent"]);
	
	$stmt->execute();
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>


