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

}
?>
