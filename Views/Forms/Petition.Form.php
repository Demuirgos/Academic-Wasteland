<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Add Petition</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="./Forms/Css/styles.min.css">
<div class="login-dark" style="margin-top:-25vh;">
    <form method="post" action="../Controllers/Petition.Handler.php" style="width: 400px;max-width: 400px;">
        <h2 class="sr-only">Login Form</h2>
        <div class="form-group">
            <input class="form-control" type="text" name="Title" placeholder="Petition Title" required>
        </div>
        <div class="form-group" style="height: 350px;width: auto;">
            <textarea class="form-control" type="text" name="Description" placeholder="Petition Body " style="min-height: 350px;max-height: 350px;" required></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" name="add">Create</button>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
