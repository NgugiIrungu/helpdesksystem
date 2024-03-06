<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $issueName = $_POST['issueName'];
    $issueDescription = $_POST['issueDescription'];
    $targetPerson = $_POST['targetPerson'];
    $issueSemester = $_POST['issueSemester'];

    // Perform any necessary validation here

    // Insert the issue data into the database
    $sql = "INSERT INTO issues (issue_name, issue_description, target_person, issue_semester)
            VALUES ('$issueName', '$issueDescription', '$targetPerson', '$issueSemester')";

    if (mysqli_query($conn, $sql)) {
        // Issue successfully added
        header("Location: dashboard.html"); // Redirect to dashboard
        exit();
    } else {
        // Error handling
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
