<?php
    session_start();
    unset($_SESSION["current"]);
    unset($_SESSION["page"]);
    header('Location:http://localhost:8000/Views/Index.php');
?>
