<title>Home - Me2oo</title>
<meta name="description" content="A petition App manager">
<link rel="stylesheet" href="Css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">

<header class="masthead text-white text-center" style="background: linear-gradient(to right, #b92b27, #1565c0);background-size: cover; height:92vh;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">Changing the WORLD starts from You<br>and Me2oo</h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form method="post" action="..\Controllers\Navigation.Handler.php">
                    <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                            <input id="searchText" class="form-control form-control-lg" oninput="validate()" list="ids" value="All-Petitions" type="search" name="key" placeholder="Enter Petition Title">
                                <datalist id="ids">
                                    
                                </datalist>
                        </div>
                        <div class="col-12 col-md-3">
                            <button id="srcbtn" class="btn btn-primary btn-block btn-lg" type="submit" name="search">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-7 mx-auto my-2">
                <button class="btn btn-primary btn-block btn-lg " onclick="(function(){ $('#PetitionModal').modal('show');})()">Create Petition</button>
            </div>
        </div>
    </div>
</header>

<div tabindex="-1" role="dialog"  class="modal fade" id="PetitionModal" class="modal-body" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="(function(){ $('#PetitionModal').modal('hide');})()">
        <span aria-hidden="true">&times;</span>
    </button>
    <?php include  $_SERVER['DOCUMENT_ROOT']."/views/forms/Petition.Form.php";?>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

<script>
function validate(){
    var val = $("#searchText").val();
    var obj = $("#ids").find("option[value='" + val + "']");

    if(obj != null && obj.length > 0)
        $( "#srcbtn" ).prop( "disabled", false );
    else
        $( "#srcbtn" ).prop( "disabled", true );
}

function LoadDataList() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost:8000/Views/Dashboard/Processess.Back/Petitons.Cache.Updater.php', true);

    xhr.onload = function () {
        document.getElementById("ids").innerHTML = this.responseText;
    }

    xhr.send();
}

window.onload = function(){
    LoadDataList();
}
setInterval(function(){
    LoadDataList();
},5000);
</script>
