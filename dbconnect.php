// Purpose: This file is used to connect to the database using the mysqli_connect function
<?php
$servername = "localhost";
$username = "root";
$password = "NGUGI";
$dbname = "customerdb";

// Create connection using conn variable to connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

/* Check connection, if it is not created an error message should be displayed
Die is used to end execution of the script any further and displays the error
$conn->connect_error check if there was an error during the connection attempt.
*/
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}else{
    // Log if the connection was successful
    echo "Connected successfully";
    // FETCH and display DATA FROM DATABASE
    // $sql = "SELECT * FROM faculty";
    // $result = $conn->query($sql);

    // // Check if there are any records in the database
    // echo "<br> Number of records in the database:";
    // echo $result->num_rows;

    // if ($result->num_rows > 0) {
    //     // output data of each row
    //     echo "<table border='1'>";
    //     echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th></tr>";
    //     while($row = $result->fetch_assoc()) {
    //         echo "<tr><td>".$row["faculty_id"]."</td><td>".$row["faculty_name"]."</td><td>".$row["faculty_email"]."</td><td>".$row["faculty_phonenumber"]."</td><td>".$row["faculty_dean"]."</td></tr>";
    //     }
    //     echo "</table>";
    // } else {
    //     echo "0 results";
    // }

    // Close the connection
    // $conn->close();


}
?>



