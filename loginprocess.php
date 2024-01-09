<?php

session_start();
include_once("connection.php");


$pupilEmail = htmlspecialchars($_POST['pupilEmail'] ?? '');
$Pword = htmlspecialchars($_POST['Pword'] ?? '');

// Check if email and password are provided
if (!empty($pupilEmail) && !empty($Pword)) {
    $stmt = $conn->prepare("SELECT pupilID, pupilPassword, pupilForename, pupilSurname FROM tblpupils WHERE pupilEmail = :pupilEmail");
    $stmt->bindParam(':pupilEmail', $pupilEmail);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashed = $row['pupilPassword'];

        if (password_verify($Pword, $hashed)) {
            //Store user information in session
            $_SESSION['loggedinID'] = $row['pupilID'];
          

            //goes to the home page if sucsessful 
            header("Location: home.php");
            exit();
        } else {
            header("Location: pupillogin.php"); // Incorrect password
            exit();
        }
    }
}


header("Location: pupillogin.php");
exit();
?>
