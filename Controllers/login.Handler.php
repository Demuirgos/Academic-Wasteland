<?php
    session_start();
    ob_start();

    require $_SERVER['DOCUMENT_ROOT']."/Models/User.Class.php" ;

    if (isset($_POST['login'])) {
        $conn = connect();
        $res = array_values(getBy("User", $conn, array(  "Email" => $_POST['Email'], 
                                            "Password" => $_POST['Password'])))[0];
        if ($res != null) {             
            $_SESSION["current"] = $res["IDU"];
        } else {
            echo "<script>
                    alert('query failed please try again')
                  </script>";
        }
    }
    header('Location:http://localhost:8000/Views/Index.php');
?>
