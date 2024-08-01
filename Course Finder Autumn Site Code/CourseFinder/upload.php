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
    <link rel="stylesheet" href="style.css">
    <title>ADD COURSE</title>
</head>
<body>
    <?php

        session_start();
        require_once "database.php";
        if (!isset($_SESSION["authenticated"]))
        {
            //if the value was not set, you redirect the user to your login page
            header("location: index.php");
            exit;
        }

        include 'header.php';
        

        require_once "database.php"; // Replace with your actual database connection script

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $courseCode = $_POST['courseCode'];
            $courseTitle = $_POST['courseTitle'];
            $university = $_POST['university'];
            $durationYears = $_POST['durationYears'];
            $startYear = $_POST['startYear'];
            $categoryID = $_POST['categoryID'];
            $saved = $_POST['saved'];

            // Prepare an insert statement to avoid SQL injection
            $stmt = $conn->prepare("INSERT INTO courses (courseCode, courseTitle, university, durationYears, startYear, categoryID, saved) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssiiss", $courseCode, $courseTitle, $university, $durationYears, $startYear, $categoryID, $saved);

            // Execute the prepared statement
            if ($stmt->execute()) {
                echo '<script>alert("Course successfully added!");</script>';
            } else {
                echo '<script>alert("Error adding course: ' . $stmt->error . '");</script>';
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        }
    ?>

    <div class="global-container">
        <div class="card login-form">
            <h3 class="card-title text-center">Add Course</h3>
            <div class="card-text">
                <form method="post">
                    <div class="form-group">
                        <label for="courseCode">Course Code</label>
                        <input type="text" class="form-control" name="courseCode" required>
                    </div>
                    <div class="form-group">
                        <label for="courseTitle">Course Title</label>
                        <input type="text" class="form-control" name="courseTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="university">University</label>
                        <input type="text" class="form-control" name="university" required>
                    </div>
                    <div class="form-group">
                        <label for="durationYears">Duration (Years)</label>
                        <input type="number" class="form-control" name="durationYears" required>
                    </div>
                    <div class="form-group">
                        <label for="startYear">Start Year</label>
                        <input type="number" class="form-control" name="startYear" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryID">Category ID</label>
                        <input type="text" class="form-control" name="categoryID" required>
                    </div>
                    <div class="form-group">
                        <label for="saved">Saved</label>
                        <select class="form-control" name="saved">
                            <option value="N">No</option>
                            <option value="Y">Yes</option>
                        </select>
                    </div>
                   
                    <button type="submit" class="btn btn-primary btn-block">Add Course</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>