<?php
session_start();
$pupilID = $_SESSION['pupilID'];
header('Location: pupilprofile.php');

try{
	include_once('connection.php');

    $stmt = $conn->prepare("DELETE FROM tblpupils WHERE pupilID = '$pupilID'");
    $stmt->execute();
    session_destroy();
    
}
catch(PDOException $e)
	{
    	echo "error".$e->getMessage();
	}

?>