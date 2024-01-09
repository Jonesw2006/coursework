<?php

session_start();
include_once("connection.php");


$tutorEmail = htmlspecialchars($_POST['tutorEmail'] ?? '');
$Pword = htmlspecialchars($_POST['Pword'] ?? '');

// Check if email and password are provided
if (!empty($tutorEmail) && !empty($Pword)) {
    $stmt = $conn->prepare("SELECT * FROM tblTutors WHERE tutorEmail = :tutorEmail");
    $stmt->bindParam(':tutorEmail', $tutorEmail);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashed = $row['tutorPassword'];

        if (password_verify($Pword, $hashed)) {
            //Store user information in session
            $_SESSION['loggedinID'] = $row['tutorID'];
          

            //goes to the home page if sucsessful 
            header("Location: tutorspace.php");
            exit();
        } else {
            header("Location: tutorlogin.php"); // Incorrect password
            exit();
        }
    }
}


header("Location: tutorlogin.php");
exit();
?>
