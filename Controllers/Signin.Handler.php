<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT']."/Models/User.Class.php" ;

    if (false && isset($_POST['signup'])) {
        $User = new User($_POST);
        $Password = $_POST['Password'];
        $res = getBy("User", connect(), array(  "Email" => $_POST['Email']));
        
        if (count($res) == 0 or $res == null) {    
            $query = "INSERT INTO User (FirstName, LastName, Gender, Email, Country, Password)
                    VALUES ('" . $User . "', '" . $Password. "')";
            
            updateData($dbh, $query);
        }
    }
    header('Location:http://localhost:8000/Views/Index.php');
?> 