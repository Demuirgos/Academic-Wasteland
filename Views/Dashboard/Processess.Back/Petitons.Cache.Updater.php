<?php
    require $_SERVER['DOCUMENT_ROOT']."/Controllers/Collections.Utils.php" ;
    require $_SERVER['DOCUMENT_ROOT']."/Models/Petition.Class.php" ;
    $AllPetitions = array_map( function($p){
                                return new Petition($p);
                            }, getBy("Petition", connect(), array()));
    echo "<option value='All-Petitions'>";
    foreach ($AllPetitions as $p) { 
        echo "<option value='". $p->Titre ."'>";
    }
    
?>


