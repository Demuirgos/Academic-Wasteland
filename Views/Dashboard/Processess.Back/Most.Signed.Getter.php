<?php
    require $_SERVER['DOCUMENT_ROOT']."/Controllers/Collections.Utils.php" ;
    require $_SERVER['DOCUMENT_ROOT']."/Models/Petition.Class.php" ;
    $AllPetitions = array_map( function($p){
                                return new Petition($p);
                            }, getBy("Petition", connect(), array()));
    usort($AllPetitions, function($a, $b){
                            if (count($a->Signatures()) == count($b->Signatures())) {
                                return 0;
                            }
                            return (count($a->Signatures()) > count($b->Signatures())) ? -1 : 1;
                        });
    $MostSigned = array_values($AllPetitions)[0];
    echo "<h4 class='card-title' id='mostTitle'>". $MostSigned->Titre ."&nbsp;</h4>
        <p class='card-text'  id='mostDescription'>". $MostSigned->Description ."</p>
        <p class='card-text' id='SignalsCount'>Signatures Count : <label> ". count($MostSigned->Signatures()) ." </label></p>
        <form action='../../Controllers/Signature.Handler.php' method='get'>
            <button class='btn btn-primary' type='submit' name='sign' value='" . $MostSigned->Reference ."'>Sign Petition</button>
        </form>"
?>


