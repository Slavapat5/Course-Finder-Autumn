<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>

    <div class="global-container">
        <div class="card login-form">
            
            <h3 class="card-title text-center">CourseFinder</h3>
            <div class="card-text">
                
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control form-control-sm" name="username">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-sm" name="password">
                    </div>

                    <button type="submit" name="submit_button" class="btn btn-block">Login</button>
                    <a href="register.php" class="btn btn-block">Register</a>
                </form>

            </div>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    
</body>
</html>

<?php
session_start();
require_once "database.php";
error_reporting(0);

// if user clicks login button
if (isset($_POST['submit_button'])) {
    // if all the fields are filled
    if (!empty($_POST['username']) && !empty($_POST['password'])) {  
        $name = $_POST['username']; 
        $password = $_POST['password'];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT firstname, surname, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Verify the password (hash it if you are storing passwords hashed)
            if ($password === $user['password']) {
                // if they do match, set the session variables to logged in
                $_SESSION['authenticated'] = true;
                $_SESSION['user'] = $name; // It's more secure to store user ID
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['surname'] = $user['surname'];

                // Redirect to the home page
                header("location: home.php");
                exit();
            } else {
                echo '<script>alert("ERROR: Invalid credentials")</script>';
            }
        } else {
            echo '<script>alert("ERROR: Invalid credentials")</script>';
        }
    } else {  
        echo '<script>alert("ERROR: All fields are required!")</script>';
    }  
}
?>
