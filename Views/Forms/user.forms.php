<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<link rel="stylesheet" href="./Forms/Css/LogProc.css">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="signView" style="display:none;">
                <form method="post" action="../Controllers/Signin.Handler.php" class="box" >
                    <h1>Signup</h1>
                    <p class="text-muted"> Please fill the blanks</p> 
                    <input type="text" name="FirstName" placeholder="FirstName" required> 
                    <input type="text" name="LastName" placeholder="LastName" required> 
                    <input type="text" name="Age" list="age" placeholder="Age" required> 
                        <datalist id="age">
                            <?php
                                for ($i=18; $i < 100; $i++) { 
                                    echo "<option value='". $i ."'>";
                                }
                            ?>
                        </datalist>
                    <input type="text" name="Country" placeholder="Country" required> 
                    <input type="text" name="Gender" list="genders" placeholder="Sex" required>
                        <datalist id="genders">
                            <option value="Male">
                            <option value="Female">
                        </datalist>
                    <input type="password" name="Password" placeholder="Password" required> 
                    <input type="password" name="Password Confirmation" placeholder="Password Confirmation" required> 
                    <input type="submit" name="signup" value="Signup" href="#">
                    <a onclick="(function(){
                        $('#logView').show();
                        $('#signView').hide();
                    })()">log into existing account</a>
                </form>

                
            </div>
            <div id="logView" >
                <form method="post" action="../Controllers/login.Handler.php" class="box">
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p>
                     <input type="text" name="Email" placeholder="Email" required> 
                     <input type="password" name="Password" placeholder="Password" required>
                     <input type="submit" name="login" value="Login" href="#">
                     <a onclick="(function(){
                        $('#signView').show();
                        $('#logView').hide();
                    })()">create a new account</a>
                </form>
                
                
            </div>
        </div>
    </div>
</div>
