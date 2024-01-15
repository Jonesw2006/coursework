<!DOCTYPE HTML>
<!--Declaring what document type this is -->
<html>
<head>

    <title>Template</title>
    <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
    <nav class="navbar">

    <div class="logo">LOGO</div>


    <!-- creating the navigation bar-->
    <ul class="navlinks">
        <div class="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="search.php">Search</a></li>

            <li class="tutors">
                
                <a href="tutorspace.php">Tutor Space</a>

                
            </li>
    

        

            
            <!-- Sign up and login links -->
            <li><a href="pupilprofile.php">Pupil Profile</a></li>

            <li><a href="pupillogin.php">Login</a></li>
            <li><a href="pupilsignup.php">Sign Up</a></li>
            <li><a href="logout.php">Log Out</a></li>
            
        </div>
    </ul>
    </nav>
    <input type="text" id="input" onkeyup="search()" placeholder="Subject...">
    <Script>
        //starting of javascript and declaring the search function
        function search() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("input");
            filter = input.value.toUpperCase();
            table = document.getElementById("tutors");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                // the number on the end of this line below sets to what data location the search function searches
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                } 
            }



        }
    
    </script>


    </script>
        <?php
    
    include_once ("connection.php");
    $table = "SELECT * FROM tbltutors";
    $result = $conn->query($table);
    
    if ($result->rowCount() > 0) {
        #this sets the table's id 
        echo "<table border='1' id='tutors'>";
        #This creates the table titles, for the search table
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Location</th>";
        echo "<th>Rating</th>";
        echo "<th>Subject</th>";
        echo "<th>More Information</th>";
        echo "</tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        
        


        
        echo "<tr>";
        
       #this displays each value for each tutor in the table
        echo "<td>" . $row["tutorForename"] . "</td>";
        echo "<td>" . $row["tutorLocation"] . "</td>";
        echo "<td><img class='image' style='width:100%;' src='rateimg/" . $row["tutorRating"] . ".png" . "'></td>";
        echo "<td>" . $row["tutorSubject"] . "</td>";
        #this link sends the user to the tutor profile page while also sending the actual variable
        #of the tutor id so that the user ends up on their desired page
        echo '<td><a href="startsession.php?tutorID=' . $row["tutorID"] . '"> More!</td>';
        echo "</tr>";
        

        


        }
        echo "</table>";
    }
    
    ?>
<footer>
    <h4>Author: Will Jones │ Oundle School </h4>
</footer>














</body>


</html>