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
    
        <!--<h1 style="margin-bottom: 10px;"> </h1>-->
        
        <!--<a href="Profile/profile.php" class="btn btn-primary">Profile</a>-->
    
    <div style="padding: 0 0; top:0;" class="form-inline">
        <button id="signupb" class="btn btn-outline-secondary btn-lg" onclick="window.location.href='./Home.php'">Log Out</button>

        <!--<h1 style="margin-bottom: 10px;"> </h1>-->
        <?php
            $user = $_GET["ID"];
            
            print("<button id=\"loginb\" class=\"btn btn-outline-secondary btn-lg\" onclick=\"window.location.href='Profile/profile2.php?ID=$user&&Status=Posted'\">Profile</button>");
        ?>
        <!--<a href="Profile/profile.php" class="btn btn-primary">Profile</a>-->
    </div>
</nav>





<!--<h1 id="homeTitle"> <font color="#F5D2CA"><center>PetGo</center></font></h1>-->


<div id="container">
    <div class="leftbox">

        <button id="searchbutton" onclick="window.location.href='Search/search.php?ID=<?php echo $_GET["ID"] ?>'">SEARCH</button>
        <!--<button id="wantbutton">WANT</button>-->
    </div>
    <div class="rightbox">
        <?php
        $user = $_GET["ID"];
        print("<button id=\"postbutton\" onclick=\"window.location.href='Post/post2.php?ID=$user'\">POST</button>");
        ?>
    </div>
</div>

<div id="id01" class="modal">

    <form class="modal-content animate" action="">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <!--<img src="img_avatar2.png" alt="Avatar" class="avatar">-->
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <!--<a href="Profile/profile.php" class="btn btn-primary">Login</a>-->
            <a href="Profile/home.php" class="btn btn-primary">Login</a>
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
</body>
</html>