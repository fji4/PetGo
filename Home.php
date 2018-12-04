<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PetGo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="Home.css">
    <script src="Home.js"></script>
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-item" href="#" id="homeTitle"><font color="#F5D2CA">PetGo</font></a>
    <div style="padding: 0 0; top:0;" class="form-inline">
        <!--<h1 style="margin-bottom: 10px;"> </h1>-->
        <button id="signupb" class="btn btn-outline-secondary btn-lg" onclick="document.getElementById('id02').style.display='block'">Register</button>
        <button id="loginb" class="btn btn-outline-secondary btn-lg" onclick="document.getElementById('id01').style.display='block'">Login</button>
    </div>
</nav>





<!--<h1 id="homeTitle"> <font color="#F5D2CA"><center>PetGo</center></font></h1>-->


<div id="container">
    <div class="leftbox">

        <button id="searchbutton"  onclick="javaScript:alert('Please Login/Register First!')">SEARCH</button>
        <!--<button id="wantbutton">WANT</button>-->
    </div>
    <div class="rightbox">
        <button id="postbutton" onclick="javaScript:alert('Please Login/Register First!')">POST</button>
    </div>
</div>

<div id="id01" class="modal">

    <form class="modal-content animate" action="Login.php" method="POST">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <!--<img src="img_avatar2.png" alt="Avatar" class="avatar">-->
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <input type="submit" value="Login" id="formSubmit" class="btn btn-primary">
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
    
    
</div>


<div id="id02" class="modal">
    
    <form class="modal-content animate" action="Signup.php" method="POST">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            <!--<img src="img_avatar2.png" alt="Avatar" class="avatar">-->
        </div>
        
        <div class="container">
            <label for="uname"><b>*Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
                <!--<input type='tel' pattern='[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}' title='Phone Number (Format: +99(99)9999-9999)'> -->
                <label for="psw"><b>*Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <br>
                <label for="phone"><b>*Phone Number</b></label><br>
                <input type="text" placeholder="phone number" name="phone" required>
                
                    
                    <!--<a href="Profile/profile.php" class="btn btn-primary">Register</a>-->
                    <input type="submit" value="Register" id="formSubmit" class="btn btn-primary">
                    
                    </div>
        
        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            
        </div>
    </form>
</div>
</body>
</html>
