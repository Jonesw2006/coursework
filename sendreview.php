<?php
session_start();
include_once("connection.php");
include 'starsavg.php';


$tutorID = intval($_POST['tutorID']);
$stars = intval($_POST['stars']); 
$reviewContent = htmlspecialchars($_POST['reviewContent']);

$pupilID = $_SESSION['loggedinID']; // takes pupilid from the login page

if($_SESSION["loggedinID"]==0){
    header('Location: pupillogin.php');
    //redirects if not signed in 
}
$query = "SELECT * FROM tblreview WHERE '$tutorID' = tutorID AND '$pupilID' = pupilID ";
$stmt1 = $conn->query($query);
$stmt1->execute();

if($stmt1->rowCount() > 0) {
     echo "<p style='color: red;'> Too many Reviews Sent! </p>";
 } else {

    // Insert the review into the database
    $stmt = $conn->prepare("INSERT INTO Tblreview (tutorID, pupilID, stars, reviewContent) VALUES (:tutorID, :pupilID, :stars, :reviewContent)");
    $stmt->bindParam(':tutorID', $tutorID);
    $stmt->bindParam(':pupilID', $pupilID);
    $stmt->bindParam(':stars', $stars);
    $stmt->bindParam(':reviewContent', $reviewContent);

    $stmt->execute();

    avgstars($tutorID);

    // Redirect to the tutor's profile page 
    header("Location: tutorprofile.php?tutorID=" . $tutorID);
    exit();
 }
?>


