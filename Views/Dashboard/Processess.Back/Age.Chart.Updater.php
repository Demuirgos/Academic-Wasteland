<?php
    require $_SERVER['DOCUMENT_ROOT']."/Controllers/Collections.Utils.php" ;
    require $_SERVER['DOCUMENT_ROOT']."/Models/Petition.Class.php" ;
    $Petition  = new Petition(array_values(getBy("Petition", connect(), array("IDP" => $_GET["petition"])))[0]);
    $groupedByAge = array_map(function($e) use($Petition){
        return count($e)/count($Petition->Signatures());
    },
    array_group_by(array_map(function($s){
                                return $s->Signer();
                            },$Petition->Signatures())
                ,function($u){
                    if($u->Age < 23)
                        return "18-23";
                    else if($u->Age < 35)
                        return "23-35";
                    else if($u->Age < 45)
                        return "35-45";
                    else if($u->Age < 60)
                        return "45-60";
                    else return "other";
                }));
    echo "  <h4 class='small font-weight-bold' >18 - 23<span class='float-right'>". $groupedByAge["18-23"] ."%</span></h4>
            <div class='progress mb-4'>
                <div class='progress-bar bg-danger' aria-valuenow='". $groupedByAge["18-23"] ."' aria-valuemin='0' aria-valuemax='100' style='width: ". $groupedByAge["18-23"] ."%;'><span class='sr-only'>". $groupedByAge["18-23"] ."%</span></div>
            </div>
            <h4 class='small font-weight-bold'>23 - 35<span class='float-right'>". $groupedByAge["23-35"] ."%</span></h4>
            <div class='progress mb-4'>
                <div class='progress-bar bg-warning' aria-valuenow='". $groupedByAge["23-35"] ."' aria-valuemin='0' aria-valuemax='100' style='width: ". $groupedByAge["23-35"] ."%;'><span class='sr-only'>". $groupedByAge["23-35"] ."%</span></div>
            </div>
            <h4 class='small font-weight-bold'>35 - 45<span class='float-right'>". $groupedByAge["35-45"] ."%</span></h4>
            <div class='progress mb-4'>
                <div class='progress-bar bg-primary' aria-valuenow='". $groupedByAge["35-45"] ."' aria-valuemin='0' aria-valuemax='100' style='width: ". $groupedByAge["35-45"] ."%;'><span class='sr-only'>". $groupedByAge["35-45"] ."%</span></div>
            </div>
            <h4 class='small font-weight-bold'>45 - 60<span class='float-right'>". $groupedByAge["45-60"] ."%</span></h4>
            <div class='progress mb-4'>
                <div class='progress-bar bg-info' aria-valuenow='". $groupedByAge["45-60"] ."' aria-valuemin='0' aria-valuemax='100' style='width: ". $groupedByAge["45-60"] ."%;'><span class='sr-only'>". $groupedByAge["45-60"] ."%</span></div>
            </div>
            <h4 class='small font-weight-bold'>other<span class='float-right'>". $groupedByAge["other"] ."%</span></h4>
            <div class='progress mb-4'>
                <div class='progress-bar bg-success' aria-valuenow='". $groupedByAge["other"] ."' aria-valuemin='0' aria-valuemax='". $groupedByAge["other"] ."' style='width: ". $groupedByAge["other"] ."%;'><span class='sr-only'>". $groupedByAge["other"] ."%</span></div>
            </div>";
?>