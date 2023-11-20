
<?php
header('Location:tutorsignup.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);

	
	$stmt = $conn->prepare("INSERT INTO TblTutors (tutorID,tutorForename,tutorSurname)VALUES (NULL,:tutorForename,:tutorSurname)");
	$stmt->bindParam(':tutorSubject', $_POST["tutorSubject"]);
	$stmt->bindParam(':tutorID', $_POST["tutorID"]);

	$stmt->execute();
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
} 
$conn=null;
?>

