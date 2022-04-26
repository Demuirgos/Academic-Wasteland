<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT']."/Models/Petition.Class.php" ;
    $CurrentUser = unserialize($_SESSION["current"]);
    $Petitions = array_map(function($p){
        return new Petition($p);
    }, getBy("Petition", connect(), array()));
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
</head>

<body>
    <?php  include (".\Componants\Header.Component.php");  ?>
    <?php  
        if(!isset($_SESSION["page"]) || $_SESSION["page"]=="main")
            include (".\Main.php");  
        else if($_SESSION["page"] == "petitions")
            include (".\Dashboard\Petitions.Vue.php");
    ?>
</body>

</html>