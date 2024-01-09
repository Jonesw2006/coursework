<?php

session_id("search");
session_start();

if(isset($_GET['tutorID'])) {
    $_SESSION['tutorID'] = $_GET['tutorID'];

}

header("Location: tutorprofile.php");
exit();
?>