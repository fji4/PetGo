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
          <a class="navbar-brand petgoTitle" href="../home2.php?ID=<?php echo $_GET["ID"]; ?>" style={font-family: "Bradley Hand";}>PetGo</a>
          
          
          
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
        $id = $_GET["PET_ID"];
        $userid = $_GET["ID"];
        // echo $id;
        $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= $id";
        // echo $sql;
        $res = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($res);
        
        $app_sql = "SELECT * FROM `Application` WHERE Pets_id = $id AND User_id = $userid";
         $app_res = mysqli_query($mysqli,$app_sql);
        $app_row = mysqli_fetch_array($app_res);
        if(!$app_row){
            $app_row["Status"] = "No one applied";
        }
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
      <th scope=\"row\">ID</th>
      <td>{$id}</td>
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
    <tr>
      <th scope=\"row\">Status</th>
      <td>{$app_row["Status"]}</td>
    </tr>
  </tbody>
</table>
</div>");
        ?>
      </div>
        
        
        
       
    
    
    </body>    

</html>