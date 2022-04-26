<?php
session_start();
include ('DataBaseApi.php');
$dbh=connect();

if (isset($_POST['add'])) {
    $titre = $_POST['Title'];
    $description = $_POST['Description'];
    $datePublic = date("F j, Y, g:i a");
    $IDP = hash ( "sha1" , $titre);
    $query = "INSERT INTO Signature (IDP, Titre, Description, DatePublic)
             VALUES 
             ('" . $IDP . "', '" . $titre . "', '" . $description . "', '" . $datePublic . "')";
    
    updateData($dbh, $query);
}
header('Location:http://localhost:8000/Views/Index.php');
?> 