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
    <title>HOME</title>
</head>
<body class="bg-secondary d-flex flex-column min-vh-100"style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
            height: 90vh">

    <?php include 'header.php';?>

    <?php
    //starting session and connecting to db
    session_start();
    require_once "database.php";

    //if user is logged in
    if (!isset($_SESSION['authenticated']))
    {
        //if the value was not set and not logged in, you redirect the user to your login page
        header("location: index.php");
        exit;
    }

    //else if user is logged in display their name
    else
    
    ?>


    <div class="sponsor">
        <h1 style="text-align: center; margin-top: 180px; color: white;">No Current Sponsors</h1>
    </div>



    <div class="container" class="container">
            <div class="col" class="home">
                <div class="home">
                <a href="#"><h3>Become A Sponsor Now</h3></a><br>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores quod ex perferendis rerum amet perspiciatis veritatis? In maiores explicabo id quas laborum, doloremque ab voluptas impedit officiis a incidunt amet. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo, tenetur? Fuga autem eius aliquid, magnam sit aut laborum perspiciatis iste labore recusandae numquam sequi et debitis! Consequatur voluptatem explicabo odit.</p>
                    <br><br><br>
                </div>
            </div>


        </div>
    </div>
    <?php include 'footer.php';?>





</body>

</html>


