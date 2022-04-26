<title>Petitions</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./Dashboard/petitions.assets/css/styles.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

<?php 
    function query_param($petitions){
        return array_reduce($petitions, function($acc, $pet){
                                            return $acc . $pet->Reference . "&petitions[]=";
                                        }, "petitions[]=") . "-1";
    }
?>

<div class="container Transparent">
    <div class="row">
        <div class="col">
            <div class="card" style="padding-bottom: 10px;margin-bottom: 10px; margin-top: 10px; width:78vw;">
                <div class="card-header">
                    The most Action is Happening Here : 
                </div>
                <div class="card-body" id="mostContainer">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="padding: 0;width: 100%;">
            <ul class="cbp-rfgrid" id="PetitionsContainer">
                <?php
                    foreach ($Petitions as $petition) {
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
            </ul>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script src="./Dashboard/assets/js/script.min.js"></script>
<script>
function UpdatePetitionsList() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost:8000/Views/Dashboard/Processess.Back/Petitions.List.Updater.php?<?php echo query_param($Petitions);?>', true);

    xhr.onload = function () {
        document.getElementById("PetitionsContainer").innerHTML += this.responseText;
    }

    xhr.send();
}

function GetMostSignedPetition() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost:8000/Views/Dashboard/Processess.Back/Most.Signed.Getter.php', true);

    xhr.onload = function () {
        document.getElementById("mostContainer").innerHTML = this.responseText;
    }

    xhr.send();
}

window.onload = function(){
    UpdatePetitionsList();
    GetMostSignedPetition();
}
setInterval(function(){
    UpdatePetitionsList();
}, 60*1000);

setInterval(function(){
    GetMostSignedPetition();
}, 1000);
</script>