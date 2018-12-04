<html>
    <head>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="profile.css">
    </head>
    <body style="background-color: #ffe6e6;">
         <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffe6e6;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar collapse navbar-collapse" id="navbarTogglerDemo01">
            
            <?php
            $user = $_GET["ID"];
            print("<a class=\"navbar-brand petgoTitle\" href=\"../home2.php?ID=$user\" style={font-family: \"Bradley Hand\";}>PetGo</a >"
          );
          ?>
          <!--
          <ul class="navbar-nav" id="login">
                <li class="nav-item">
                    <a class="nav-link" class="btn btn-outline-secondary btn-lg" onclick="document.getElementById('id01').style.display='block'">Manage</a >
                </li>
          </ul>
          -->
        </div>
      </nav>
        <div>
            <div>
                <div style="float:left;margin:10px 10px; width:10%;background-color: #ffe6e6;align:center;">
                    <!--<button id="loginb" class="btn btn-outline-secondary btn-lg" style="align:center;" onclick="window.location.href='profile2.php?ID=$user'">Posted</button>-->
                    <?php
                         $user = $_GET["ID"];
                          print("<a  class=\"btn btn-outline-secondary btn-lg\"  href=\"profile2.php?ID=$user&&Status=Posted \" style=\"align:center;\">Posted</a >"
                            );
                    ?>
                    <br><br>
                    <?php
                         $user = $_GET["ID"];
                          print("<a  class=\"btn btn-outline-secondary btn-lg\"  href=\"profile2.php?ID=$user&&Status=Applied \" style=\"align:center;\">Applied</a >"
                            );
                    ?>
                    <!--<button id="loginb" class="btn btn-outline-secondary btn-lg" onclick="window.location.href='profile_apply.php?ID=$user'">Applied</button>-->
                </div>
            </div>
        
        
        <div class="card-columns" id="manypets">
            <div id="id01" class="modal">

          <form class="modal-content animate" action="./delete.php" method = "POST">
              <div class="imgcontainer">
                  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                  <!--<img src="img_avatar2.png" alt="Avatar" class="avatar">-->
              </div>
  
              <div class="container">
                  <label for="petid"><b>PetID</b></label>
                  <input type="number" placeholder="Enter pet ID" name="id" required>
                  <br>
                  <!--<button type="submit" href='../Post/update_home.php'>Edit</button>-->
                  <button type="submit" onclick="window.location.href='./delete.php'">Delete</button>
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
      
        <?php
            $mysqli = new mysqli("localhost", "findyourpet_meow_411", "meow_411", "findyourpet_PetGo");
    if(!$mysqli) {
        die('Could not connect: ' .mysql_error());
    }
    else{
        $user = $_GET["ID"]; 
        $Status = $_GET["Status"];
        
        if (strcmp($Status,"Posted")==0){
            $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id And Pets.User_ID =".$user;
            $res = mysqli_query($mysqli,$sql);
        while ($row = mysqli_fetch_array($res)){
            print("<div class=\"card\" style=\"text-align:center;\">
  <img class=\"card-img-top\" src=\"{$row['photo']}\" alt=\"No images\" onerror=\"this.onerror=null;this.src='Default.jpg';\" align=\"middle\" style=\"width:260px;height:260px;\">

  <div class=\"card-body\">
    <div style=\"height:80px;\" <h5 class=\"card-title\" >{$row['Species']}</h5></div>
    <a href=\"view.php?PET_ID={$row['id']}&&ID={$_GET["ID"]}\" class=\"btn btn-primary\">View</a>
    <a href=\"update_home.php?ID={$row['id']}\" class=\"btn btn-primary\">Update</a>
  </div>
</div>");
        }
        }
        else{
            $sql = "SELECT * FROM `Pets`,`pets_advance`, `Application` WHERE Pets.ID= pets_advance.id And Pets.ID= Application.Pets_id And Application.User_id = ".$user;
            $res = mysqli_query($mysqli,$sql);
            while ($row = mysqli_fetch_array($res)){
            print("<div class=\"card\" style=\"text-align:center;\">
  <img class=\"card-img-top\" src=\"{$row['photo']}\" alt=\"No images\" onerror=\"this.onerror=null;this.src='Default.jpg';\" align=\"middle\" style=\"width:260px;height:260px;\">

  <div class=\"card-body\">
    <div style=\"height:80px;\"> <h5 class=\"card-title\" >{$row['Species']}</h5></div>
    <a href=\"view.php?PET_ID={$row['id']}&&ID={$_GET["ID"]}\" class=\"btn btn-primary\">View</a>
  </div>
</div>");
        }
        
        }
        mysqli_close($mysqli);
    }
        ?>
        </div>
        </div>
    </body>
</html>