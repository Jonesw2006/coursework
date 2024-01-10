<?php
include_once('connection.php');
$tutorID = $_SESSION['tutorID'];
function avgstars($tutorID) {
    global $conn;

    #gets an average for the stars under tutors name
    $query = "SELECT AVG(stars) AS starsavg FROM tblreview WHERE tutorID = $tutorID";
    $result = $conn->query($query);

    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        #rounding the stars so they are 1-5 therefore wont mess up pictures
        $starsavg = round($row['starsavg']);
        #updating the table 
        $update = "UPDATE tbltutors SET tutorRating = '$starsavg' WHERE tutorID = $tutorID";
        $result2 = $conn->query($update);
    
}
}
?>