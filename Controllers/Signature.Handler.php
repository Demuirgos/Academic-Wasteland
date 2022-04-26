<?php
session_start();
require $_SERVER['DOCUMENT_ROOT']."/Models/Petition.Class.php" ;
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" style="background:linear-gradient(to right, #b92b27, #1565c0); tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Operation Result</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="height:25vh; width;40%;">
            <?php
            if (isset($_SESSION["current"]) && isset($_POST["sign"])) {
                $dbh=connect();
                $idp = $_POST['sign'];
                $idu = $_SESSION["current"];
                $date = date("F j, Y, g:i a");
                $res = array_values(getBy("Signature", $dbh, array(  "IDU" => $idu)))[0];
                if($res == null)
                {
                    $query = "INSERT INTO Signature (IDP, IDU, DateS)
                            VALUES (" . $idp . "," . $idu . " '" . $date . "')"; 
                    updateData($dbh, $query);
                    echo "Petition Signed Successfully";
                } else {
                    echo "you already signed this petition";
                }
            } else {
                echo "please login before signing petitions";
            }
            ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="history.back()">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    function showModal(){
        $("#exampleModal").modal('show');
    }
    window.onload= showModal;
</script>