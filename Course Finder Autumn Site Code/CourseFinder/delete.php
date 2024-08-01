<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>DELETE COURSE</title>
</head>
<body>
    <?php
        require_once "database.php"; // Replace with your actual database connection script
        require_once "header.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['courseCode'])) {
            $courseCode = $_POST['courseCode'];

            // Prepare a delete statement to avoid SQL injection
            $stmt = $conn->prepare("DELETE FROM courses WHERE courseCode = ?");
            $stmt->bind_param("s", $courseCode);

            // Execute the prepared statement
            if ($stmt->execute()) {
                echo '<script>alert("Course successfully deleted!");</script>';
            } else {
                echo '<script>alert("Error deleting course: ' . $stmt->error . '");</script>';
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        }
    ?>

    <div class="global-container">
        <div class="card login-form">
            <h3 class="card-title text-center">Delete Course</h3>
            <div class="card-text">
                <form method="post">
                    <div class="form-group">
                        <label for="courseCode">Course Code</label>
                        <input type="text" class="form-control" name="courseCode" placeholder="Enter Course Code" required>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">Delete Course</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>
</html>