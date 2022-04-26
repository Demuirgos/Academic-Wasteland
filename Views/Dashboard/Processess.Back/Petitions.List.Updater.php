<?php
    require $_SERVER['DOCUMENT_ROOT']."/Controllers/Collections.Utils.php" ;
    require $_SERVER['DOCUMENT_ROOT']."/Models/Petition.Class.php" ;
    $OldPetitionsRefs = $_GET["petitions"];
    $AllPetitions = array_map( function($p){
                                return new Petition($p);
                            }, getBy("Petition", connect(), array()));
    $NewPetitions = array_filter($AllPetitions, function($p) use(&$OldPetitionsRefs) {
        return !in_array($p->Reference, $OldPetitionsRefs);
    });
    foreach ($NewPetitions as $petition) {
            echo "<li id='". $petition->Titre ."' style='width: 262px;'>".
                    "<div class='card border-white border rounded shadow-lg' data-bs-hover-animate='pulse' style='width: 230px;height: 350px;margin: 10px;margin-left: 15px;'>".
                        "<div class='card-body' style='width: 100%;height: 350px;padding: 0px;margin: 10px;'>".
                            "<div class='imge' style='height:30%;'></div>".
                            "<h4 class='card-title' style='height:7%; margin-top: 5px;'>". $petition->Titre ."</h4>".
                            "<h6 class='text-muted card-subtitle mb-2' style='height:5%; margin-top: 0px;'>". $petition->DatePublic ."</h6>".
                            "<div style='width: 90%; height:30%; margin-top: 15px;margin-bottom: 20px; overflow-y: scroll;'><p class='card-text'>". $petition->Description ."</p></div>".
                            "<div class='btn-group' role='group'>".
                                "<form action='../Controllers/Signature.Handler.php' method='post'>".
                                    "<button class='btn btn-primary' type='submit' name='sign' value=". $petition->Reference ." style='background-color: rgb(72,72,72);'>Sign Petition</button>".
                                "</form>".   
                                "<form action='.\Dashboard\Petition.Vue.php' method='get'>".
                                    "<button class='btn btn-primary' type='submit' name='petition' value=". $petition->Reference ." style='margin-left: 5px;background-color: rgb(72,72,72);'>+</button>".
                                "</form>".   
                            "</div>".
                        "</div>".
                    "</div>".
                "</li>";
    }
?>
