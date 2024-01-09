<?php
session_start();
include_once("connection.php");


$tutorID = intval($_POST['tutorID']);
$rating = intval($_POST['stars']); 
$comment = htmlspecialchars($_POST['reviewContent']);

$pupilID = $_SESSION['loggedinID']; // takes pupilid from the login page

// Insert the review into the database
$stmt = $conn->prepare("INSERT INTO Tblreview (tutorID, pupilID, stars, reviewContent) VALUES (:tutorID, :pupilID, :stars, :reviewContent)");
$stmt->bindParam(':tutorID', $tutorID);
$stmt->bindParam(':pupilID', $pupilID);
$stmt->bindParam(':stars', $stars);
$stmt->bindParam(':reviewContent', $reviewContent);

$stmt->execute();

// Redirect to the tutor's profile page or wherever is appropriate
header("Location: tutorprofile.php?tutorID=" . $tutorID);
exit();
?>


