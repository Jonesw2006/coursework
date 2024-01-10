<?php



session_start();
$tutorID = $_SESSION['tutorID'];
$pupilID = $_SESSION['loggedinID'];
$sessionDate = $_POST['sessiondate'];


$sessionTime = ($_POST['sessiontime']);

echo $sessionTime;



try{
    include_once('connection.php');
  

   // $query = "SELECT * FROM tblsessions WHERE $tutorID = tutorID AND $sessionDate = sessiondate AND $sessionTime = sessiontime";
   // $stmt1 = $conn->query($query);

   

   // if($stmt1->fetch(PDO::FETCH_ASSOC)) {
        //echo "<p style='color: red;'> SESSION ALREADY BOOKED</p>";
  //  } else {
        $stmt = $conn->prepare("INSERT INTO tblsessions (sessionID, pupilID, tutorID, addressLine1, addressLine2, addressLine3, postcode, online, sessionDate, sessionTime )VALUES (NULL,:pupilID,:tutorID,:addressline1,:addressline2,:addressline3,:postcode,:online,:sessiondate,:sessiontime)");
        
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
    }
    
    


catch(PDOException $e)
	{
    	echo "error".$e->getMessage();
	}
	$conn=null;

?>