<?php 
    session_start();
    if (isset($_POST['main'])) {
        $_SESSION["page"] = "main";
        unset($_POST['main']);
        header('Location:http://localhost:8000/Views/Index.php');
    } else {
        if (isset($_POST['key'])) {
            if($_POST["key"] == "All-Petitions"){
                $_SESSION["page"] = "petitions";
                header('Location:http://localhost:8000/Views/Index.php');
            }else{
                $PID = hash ( "sha1" , $_POST["key"]);
                header("Location:http://localhost:8000/Views/Dashboard/Petition.Vue.php?petition=$PID");
            }
        } 
    }
?>