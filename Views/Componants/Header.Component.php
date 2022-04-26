<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<link rel="stylesheet" href="./Css/LogProc.css">
<nav class="navbar navbar-light navbar-expand bg-light d-flex navigation-clean">
    <div class="container">
    <?php
        if($_SESSION["page"]=="petitions") echo "
            <form method='post' action='..\Controllers\Navigation.Handler.php' style='  width:65%;'>
                <button class='btn btn-primary ml-auto' href='#' name='main'  style='background:none; 
                                                                                    border:none;
                                                                                    color:rgb(0,0,0);'>
                    <div><i class='fa fa-home'></i></div>
                </button>
            </form>";   

    ?>
        
        <div class="form-inline d-flex flex-grow-1 flex-fill mr-auto">
            <?php if($_SESSION["page"]=="petitions") echo "<input type='search' class='form-control d-flex flex-grow-1 flex-fill m-auto justify-content-xl-center align-items-xl-center search-field' type='search' id='search-field' oninput='SearchAndFilter(this.value)'>";?>
        </div>
        <div class="collapse navbar-collapse" id="navcol-2" style="width: 100px;">  
            <a class="btn btn-primary ml-auto" role="button" href="<?php if(isset($_SESSION["current"])) echo "../Controllers/Logout.Handler.php"; else echo "#";?>" style="width: 100px;" onclick="<?php if(!isset($_SESSION["current"])) echo "(function(){ $('#myModal').modal('show');})()";?>">
                <?php if(isset($_SESSION["current"]))
                        echo "Log Out";
                      else 
                        echo "Log In";?>
            </a>
        </div>
    </div>
</nav>
<div tabindex="-1" role="dialog"  class="modal fade" id="myModal" class="modal-body" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="(function(){ $('#myModal').modal('hide');})() ">
        <span aria-hidden="true">&times;</span>
    </button>
    <?php include  $_SERVER['DOCUMENT_ROOT']."/views/forms/user.forms.php";?>
</div>

<script>
    function SearchAndFilter(filter){
        var container = document.getElementById("PetitionsContainer").getElementsByTagName('li');
        for (var i = 0; i < container.length; i++) {
            var name = container[i].getAttribute("id");
            if (name.indexOf(filter) == 0) 
                container[i].style.display = 'list-item';
            else
                container[i].style.display = 'none';
        }
    }
</script>