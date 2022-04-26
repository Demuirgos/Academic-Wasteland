<?php
    require $_SERVER['DOCUMENT_ROOT']."/Controllers/Collections.Utils.php" ;
    require $_SERVER['DOCUMENT_ROOT']."/Models/Petition.Class.php" ;
    $Petition  = new Petition(array_values(getBy("Petition", connect(), array("IDP" => $_GET["petition"])))[0]);
    $count = 0;
    foreach ($Petition->Signatures() as $signature) {
        $signer = $signature->Signer();
        echo "  <li class='list-group-item'>
                    <div class='row align-items-center no-gutters'>
                        <div class='col mr-2'>
                            <h6 class='mb-0'><strong>". $signer->Prenom . " " . $signer->Nom ."</strong></h6><span class='text-xs'>". $signature->Date ."</span>
                        </div>
                    </div>
                </li>";
        if($count == 5) break;
        $count += 1;
    }
?>
