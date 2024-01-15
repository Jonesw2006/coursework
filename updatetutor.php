<?php
session_start();
$tutorID = $_SESSION['tutorID'];
header('Location: tutorspace.php');



try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
    

    $tutorForename = $_POST['tutorforename'];
    $tutorSurname = $_POST['tutorsurname'];
    $tutorEmail = $_POST['tutoremail'];
    $tutorPassword = $_POST['tutorpassword'];
    $tutorLocation = $_POST['tutorlocation'];
    $tutorSubject = $_POST['tutorsubject'];
    $tutorDescription = $_POST['tutordescription'];
    $startTime = $_POST['starttime'];
    $endTime = $_POST['endtime'];
    $image = $_POST['image'];
    

    $hashed_password = password_hash($_POST["tutorpassword"], PASSWORD_DEFAULT);




    $stmt = $conn->prepare("UPDATE tbltutors SET tutorForename = '$tutorForename', tutorSurname = '$tutorSurname', tutorEmail = '$tutorEmail'
    , tutorPassword = '$hashed_password', tutorLocation = '$tutorLocation', tutorSubject = '$tutorSubject', tutorDescription = '$tutorDescription',
    startTime = '$startTime', endTime = '$endTime' WHERE tutorID = '$tutorID'");

	$stmt->bindParam(':tutorforename', $tutorForename);
	$stmt->bindParam(':tutorsurname', $tutorSurname);
	$stmt->bindParam(':tutoremail', $tutorEmail);
	$stmt->bindParam(':tutorpassword', $hashed_password);
	$stmt->bindParam(':tutorlocation', $tutorLocation);
	

	
	$stmt->bindParam(':tutorsubject', $tutorSubject);
	$stmt->bindParam(':tutordescription', $tutorDescription);

	
	$stmt->bindParam(':starttime', $startTime);
	$stmt->bindParam(':endtime', $endTime);
	
	


	
	$stmt->execute();
}
catch(PDOException $e)
	{
    	echo "error".$e->getMessage();
	}

?>