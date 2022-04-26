<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT']."/Models/Petition.Class.php" ;
    $CurrentUser = unserialize($_SESSION["current"]);
    $CurrentPetition = new Petition(array_values(getBy("Petition", connect(), array("IDP" => $_GET["petition"])))[0]);
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Dashboard - Brand</title>
<link rel="stylesheet" href="petition.assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
<link rel="stylesheet" href="petition.assets/css/styles.min.css">


<div class="modal fade" id="exampleModal" style="background:linear-gradient(to right, #b92b27, #1565c0);" data-backdrop="static" data-keyboard="false" tabindex="2" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="height:85vh; width:80vw; position: fixed;
                                                              top: 50%;
                                                              left: 50%;
                                                              transform: translate(-50%, -50%);">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Petition Details :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="history.back()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="height:85%">
        <div style="height:100%">
            <div id="wrapper" style="height:100%">
                <div class="d-flex flex-column" id="content-wrapper">
                    <div id="content"  style="background:linear-gradient(to right, #b92b27, #1565c0);">
                        <div class="container-fluid bg-shiny">
                            <div class="row">
                                <div class="col">
                                    <div class="card" style="padding-bottom: 10px;margin-bottom: 10px; margin-top: 10px;">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo $CurrentPetition->Titre; ?>&nbsp;</h4>
                                            <p class="card-text"><?php echo $CurrentPetition-> Description; ?></p>
                                            <form action='../../Controllers/Signature.Handler.php' method='get'>
                                                <button class='btn btn-primary' type='submit' name='sign' value="<?php echo $CurrentPetition->Reference?>">Sign Petition</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-xl-8">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="text-primary font-weight-bold m-0">Signatures Time Series :&nbsp;</h6>
                                        </div>
                                        <div class="card-body">
                                            <div id="countContainer" style="height: 300px; width: 100%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-xl-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="text-primary font-weight-bold m-0">Signatures Gender Distribution :</h6>
                                        </div>
                                        <div class="card-body">
                                            <div id="genderContainer" style="height: 300px; width: 100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid bg-shiny row">
                            <div class="col-lg-7 mb-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="text-primary font-weight-bold m-0">Signature Age Distribution :</h6>
                                    </div>
                                    <div class="card-body" id="ageContainer">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="text-primary font-weight-bold m-0">Last Signatures</h6>
                                    </div>
                                    <ul class="list-group list-group-flush" id="sigsContainer">
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer" style="margin-top:2%;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="history.back()">Close</button>
      </div>
    </div>
  </div>
</div>

<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="petition.assets/js/script.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
function loadLastSign() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost:8000/Views/Dashboard/Processess.Back/Signature.Comp.Updater.php?petition=<?php echo $CurrentPetition->Reference;?>', true);

    xhr.onload = function () {
        document.getElementById('sigsContainer').innerHTML = this.responseText;             
    }

    xhr.send();
}
function loadAgeDist() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost:8000/Views/Dashboard/Processess.Back/Age.Chart.Updater.php?petition=<?php echo $CurrentPetition->Reference;?>', true);

    xhr.onload = function () {
        document.getElementById('ageContainer').innerHTML = this.responseText;             
    }

    xhr.send();
}

function loadLastGender() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost:8000/Views/Dashboard/Processess.Back/Gender.Chart.Updater.php?petition=<?php echo $CurrentPetition->Reference;?>', true);

    xhr.onload = function () {
        var chart1 = new CanvasJS.Chart("genderContainer", {
            theme: "light2",
            animationEnabled: true,
            data: [{
                type: "doughnut",
                indexLabel: "{symbol} - {y}",
                yValueFormatString: "#,##0.0\"%\"",
                showInLegend: true,
                legendText: "{label} : {y}",
                dataPoints: JSON.parse(this.responseText)
            }]
        });
        chart1.render();           
    }

    xhr.send();
}
function loadLastTime() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost:8000/Views/Dashboard/Processess.Back/Time.Chart.Updater.php?petition=<?php echo $CurrentPetition->Reference;?>', true);

    xhr.onload = function () {
        var chart2 = new CanvasJS.Chart("countContainer", {
            data: [{
                type: "stepLine",
                dataPoints: JSON.parse(this.responseText)
            }]
        });
        chart2.render();         
    }

    xhr.send();
}

function showModal(){
    $("#exampleModal").modal('show');
}
window.onload = function(){
    loadLastGender(); // This will run on page load
    loadLastTime(); // This will run on page load
    loadLastSign(); // This will run on page load
    loadAgeDist();
    showModal();
}
setInterval(function(){
    loadLastGender(); // This will run on page load
    loadLastTime(); // This will run on page load
    loadAgeDist();
    loadLastSign();
}, 5000);
</script>
