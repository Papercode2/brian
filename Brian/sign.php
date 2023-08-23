<!DOCTYPE html>
<html>
<head>
    <title>Prime Hotel Sign-Up</title>
    <style>
      
    </style>
</head>
<body style="background-color:powderblue;">
    <div class="container">
        <h2>Sign Up for Prime Hotel</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="submit">
            </div>
        </form>

        <?php
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            // Validate and sanitize form data (you may need more robust validation in a real application)
            // ...

            // Connect to the database
            $host = "localhost"; // Replace with your database host
            $username_db = "root"; // Replace with your database username
            $password_db = ""; // Replace with your database password
            $database = "brian"; // Replace with your database name

            $conn = new mysqli($host, $username_db, $password_db, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and execute the SQL query to insert the user data
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "Sign-up successful!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close the database connection
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
