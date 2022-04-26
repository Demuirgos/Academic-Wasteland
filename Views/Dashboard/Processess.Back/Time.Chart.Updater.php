<?php
    $countData = array(
        array("y"=> 26274, "label"=> "2007"),
        array("y"=> 26380, "label"=> "2008"),
        array("y"=> 25058, "label"=> "2009"),
        array("y"=> 24864, "label"=> "2010"),
        array("y"=> 26707, "label"=> "2011"),
        array("y"=> 29309, "label"=> "2012"),
        array("y"=> 34519, "label"=> "2013"),
        array("y"=> 40101, "label"=> "2014"),
        array("y"=> 48401, "label"=> "2015"),
        array("y"=> 58580, "label"=> "2016")
    );
?>

<?php
    require $_SERVER['DOCUMENT_ROOT']."/Controllers/Collections.Utils.php" ;
    require $_SERVER['DOCUMENT_ROOT']."/Models/Petition.Class.php" ;
    $Petition  = new Petition(array_values(getBy("Petition", connect(), array("IDP" => $_GET["petition"])))[0]);
    $timeData =  array_group_by($Petition->Signatures()
                ,function($u){
                    return $u->getTime();             
                });
    $mapped = array_values(array_map(function($itm) use(&$timeData) {
            return array(
                "label" => array_search($itm, $timeData),
                "y" => count($itm)
            );
        },$timeData));
    echo json_encode($mapped, JSON_NUMERIC_CHECK);
?>  
