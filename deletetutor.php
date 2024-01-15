<?php
session_start();
$tutorID = $_SESSION['tutorID'];
header('Location: tutorspace.php');



try{
	include_once('connection.php');

    $stmt = $conn->prepare("DELETE FROM tbltutors WHERE tutorID = '$tutorID'");
    $stmt->execute();
    session_destroy();
    
}
catch(PDOException $e)
	{
    	echo "error".$e->getMessage();
	}

?>