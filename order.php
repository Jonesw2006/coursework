<?php



session_start();
$tutorID = $_SESSION['tutorID'];
$pupilID = $_SESSION['loggedinID'];
$sessionDate = $_POST['sessiondate'];


$sessionTime = $_POST['sessiontime'];

if($pupilID==0){
    header('Location: pupillogin.php');
    //redirects if not signed in 
}



try{
    include_once('connection.php');
  

   $query = "SELECT * FROM tblsessions
   JOIN tbltutors ON tblsessions.tutorID = tbltutors.tutorID
   WHERE tblsessions.tutorID = '$tutorID'
   AND tblsessions.sessionDate = '$sessionDate'
   AND tblsessions.sessionTime = '$sessionTime' ";
   $stmt1 = $conn->query($query);
   $stmt1->execute();

   //$query2 = "SELECT * FROM tbltutors WHERE '$sessionTime' NOT BETWEEN tbltutors.endTime  
   //AND tbltutors.startTime ";
   //$stmt2 = $conn->query($query2);
   //$stmt2->execute();
   

   if($stmt1->rowCount() > 0)  {
        echo "<p style='color: red;'> SESSION ALREADY BOOKED/TIME UNAVAILABLE</p>";
    } else {
        $stmt = $conn->prepare("INSERT INTO tblsessions (sessionID, pupilID, tutorID, addressLine1, addressLine2, addressLine3, postcode, online, sessionDate, sessionTime )VALUES (NULL, :pupilID,:tutorID,:addressline1,:addressline2,:addressline3,:postcode,:online,:sessiondate,:sessiontime)");
        
        $stmt->bindParam(':pupilID', $pupilID);
        $stmt->bindParam(':tutorID', $tutorID);
        $stmt->bindParam(':addressline1', $_POST["addressline1"]);
        $stmt->bindParam(':addressline2', $_POST["addressline2"]);
        $stmt->bindParam(':addressline3', $_POST["addressline3"]);
        $stmt->bindParam(':postcode', $_POST["postcode"]);
        $stmt->bindParam(':online', $_POST["online"]);
        $stmt->bindParam(':sessiondate', $sessionDate);
        $stmt->bindParam(':sessiontime', $sessionTime);

        $stmt->execute();
        echo "Booking Successful, you tutor will be in contact soon";
    }
}
    
    


catch(PDOException $e)
	{
    	echo "error".$e->getMessage();
	}
	$conn=null;

?>