<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .register-form {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #eaeaea;
            border-radius: 4px;
            background-color: #fff;
        }
        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            height: 40px;
        }
        .btn-primary {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .text-center {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="register-form">
        <h2>Register Here</h2>
        <?php
        require_once "dbconnect.php";
        if (isset($_POST["Register"])) { 
            $username = $_POST["username"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $firstName = $_POST["first_name"];
            $lastName = $_POST["last_name"];
            $email = $_POST["email"];
            $role = $_POST["role"];

            $sql = "INSERT INTO users (user_username, user_password, user_fname, user_lname, user_email, user_role) 
                    VALUES ('$username', '$password', '$firstName', '$lastName', '$email', '$role')";

            if ($conn->query($sql) === TRUE) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
        ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="lecturer">Lecturer</option>
                    <option value="student">Student</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-primary">Register</button>
            </div>
        </form>
        <p class="text-center">Already have an account? <a href="login.html">Login</a></p>
    </div>
</body>
</html>


