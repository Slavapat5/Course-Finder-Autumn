<?php
//if the session variable is set (if user is logged in), unset the variable
session_start();
if (isset($_SESSION["authenticated"]))
{
    session_destroy();
}

//go  back to index page
header("location: index.php");
?>