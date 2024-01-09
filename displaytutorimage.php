<?php
include_once("connection.php");

// Retrieve image data from the database based on the tutor ID
$tutorID = $_GET['tutorID'];
try {
    $stmt = $conn->prepare("SELECT image FROM TblTutors WHERE tutorID = :tutorID");
    $stmt->bindParam(':tutorID', $tutorID);
    $stmt->execute();

    
    header('Content-Type: image/png'); // HOW TO MAKE UNIVERSAL????

    
    echo $stmt->fetch(PDO::FETCH_ASSOC)['image'];
} catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>
