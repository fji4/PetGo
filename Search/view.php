<html>
    <head>
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="search.css">
    </head>
    
    
    <body>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffe6e6;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand petgoTitle" href="../home2.php?ID=<?php echo $_GET["ID"] ?>" style={font-family: Bradley Hand;}>PetGo</a>
          
          <ul class="navbar-nav" id="login">
                <li class="nav-item">
                    <!--<a class="nav-link" href="../Profile/profile2.php">Profile</a>-->
                    <?php
                         $user = $_GET["ID"];
                          print("<a  class=\"nav-link btn btn-outline-secondary btn-lg\"  href=\"../Profile/profile2.php?ID=$user\" style=\"align:center;\" >Profile</a >"
                            );
                    ?>
                </li>
          </ul>
          
          
        </div>
      </nav>

      <div id="viewpets">
          
        <?php
        // echo $_Get["species"];
            $mysqli = new mysqli("localhost", "findyourpet_meow_411", "meow_411", "findyourpet_PetGo");
    if(!$mysqli) {
        die('Could not connect: ' .mysql_error());
    }
    else{
        $id = $_GET["PETID"];
        $user=$_GET["ID"];
        
        $add_sql = "INSERT INTO `Searcher_History` (Searcher_History.User_ID,Searcher_History.Pet_ID) VALUES (".$user.",".$id.")";
        $return = mysqli_query($mysqli, $add_sql);
        if ($return) {
            //echo "New record created successfully";
        } else {
            echo "Error: " . $add_sql . "<br>" . $return;
        }
        
        // echo $id;
        $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= $id";
        // echo $sql;
        $res = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($res);
        // echo $row["Gender"];
    }
        
        
        
        
        
            print("<div>
            
            <table class=\"table\">
  <thead>
    <tr>
      <th scope=\"col\" colspan=\"2\">Detail</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope=\"row\">Species</th>
      <td>{$row["Species"]}</td>
    </tr>
    <tr>
      <th scope=\"row\">Age</th>
      <td>{$row["Age"]}</td>
    </tr>
    <tr>
      <th scope=\"row\">Status</th>
      <td>{$row["Status"]}</td>
    </tr>
    
    <tr>
      <th scope=\"row\">Gender</th>
      <td>{$row["Gender"]}</td>
    </tr>
    

    
    <tr>
      <th scope=\"row\">Description</th>
      <td>{$row["Description"]}</td>
    </tr>
  </tbody>
</table>

<a href=\"apply.php?PET_ID={$id}&&ID={$user}\" class=\"btn btn-primary\" style=\"margin: 0px 23%;\">Apply</a>

</div>");
        ?>
      </div>
        
        
        
       
    
    
    </body>    

</html>