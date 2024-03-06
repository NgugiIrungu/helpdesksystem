<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CUEA's Timetable Management System</title>
    <link rel="stylesheet" href = "style.css">
</head>
<body>
    
    <h1>Kindly Create an Account </h1>
    <div class="container">
        <?php
    
        require_once "dbconnect.php";
        if (isset($_POST["Register"])) {
            /*$_POST global varriable array that captures all the data posted to the script from the form sent using POST method.
             It uses the name of the input elements to capture data assigned to the input 
            */
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["user_email"];
            $username = $_POST["username"];
            $password = $_POST["user_password"];
            $passwordRpt = $_POST["repeat_password"];
            $userRole = $_POST["user_role"];

            $errors = array();
            if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($passwordRpt)) {
                array_push($errors, "Ensure All Fields Have Been Filled");
            }
            //to validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Kindly Enter A Valid Email Address");
            }
            //to ensure password has a minimum of eight characters
            if (strlen($password) < 8) {
                array_push($errors, "Password must have at least 8 characters");
            }
            //to ensure password and repeated passwords match
            if ($password !== $passwordRpt) {
                array_push($errors, "Passwords do not match!");
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } 
            else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                // Insert data to database
                $stmt = mysqli_stmt_init($conn);
                //SQL variable containing the query that will be used to insert the data to the database
                $sql = "INSERT INTO users (firstname, lastname, user_email, username, user_password, role) VALUES (?, ?, ?, ?, ?, ?)";
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $email, $username, $hashedPassword, $userRole);
                    mysqli_stmt_execute($stmt);

                    if (mysqli_stmt_error($stmt)) {
                        die("SQL Error: " . mysqli_stmt_error($stmt));
                    }

                    echo "Successfully Registered";
                } else {
                    die("Oh No! Something Went Wrong! " . mysqli_error($conn));
                }

            }
        }
        ?>
        <form action="test.php" method="post">
            <div class="form-group">
                <input type="text" name="firstname" placeholder="Enter Your First Name">
            </div>
            <div class="form-group">
                <input type="text"  name="lastname" placeholder="Enter Your Last Name">
            </div>
            <div class="form-group">
                <input type="email"  name="user_email" placeholder="Email Address">
            </div>
            <div class="form-group">
                <input type="text"  name="username" placeholder="Username:">
            </div>
            <div class="form-group">
                <input type="password"  name="user_password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password"  name="repeat_password" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <label for="user_role">Select Role:</label>
                <select name="user_role" id="user_role">
                    <option value="admin">Admin</option>
                    <option value="lecturer">Lecturer</option>
                    <option value="student">Student</option>
                </select>
            </div>
            <div class="form-btn">
                <button type="submit"  name="Register">
            </div>
        </div>
    </div>
</body>
</html>