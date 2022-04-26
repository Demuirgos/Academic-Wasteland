<?php
    require $_SERVER['DOCUMENT_ROOT']."/Controllers/Collections.Utils.php" ;
    require $_SERVER['DOCUMENT_ROOT']."/Models/Petition.Class.php" ;
    $Petition  = new Petition(array_values(getBy("Petition", connect(), array("IDP" => $_GET["petition"])))[0]);
    $genderData = array( 
        array("label"=>"Female","y"=> count(array_filter($Petition->Signatures(), function($s){
            return $s->Signer()->Gender == true;
        }))),
        array("label"=>"Male" ,"y"=> count(array_filter($Petition->Signatures(), function($s){
            return $s->Signer()->Gender == false;
        }))),
    );
    echo json_encode($genderData, JSON_NUMERIC_CHECK);
?>
