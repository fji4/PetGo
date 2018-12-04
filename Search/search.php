<?php
    $user = $_GET["ID"];
print("
<html>
    <head>
            <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\">
    
    </head>
    <body>
         <nav class=\"navbar navbar-expand-lg navbar-light\" style=\"background-color: #ffe6e6;\">
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarTogglerDemo01\" aria-controls=\"navbarTogglerDemo01\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"navbar collapse navbar-collapse\" id=\"navbarTogglerDemo01\">
            
          <a class=\"navbar-brand petgoTitle\" href=\"../home2.php?ID=$user\" style=\"font-family: Bradley Hand; font-size: 40px;\">PetGo</a >
          <form class=\"form-inline\" action = \"\" method = \"POST\">
            <select name=\"age\" id=\"select_age\">
              <option value=\"None\">None</option>
              <option value=\"0-5\">0-5</option>
              <option value=\"6-10\">6-10</option>
              <option value=\"11-15\">11-15</option>
              <option value=\"16-20\">16-20</option>
          </select>
          <select name=\"gender\" id=\"select_age\">
            <option value=\"Female\">Female</option>
            <option value=\"Male\">Male</option>
            <option value=\"Unknown\">Unknown</option>
        </select>
            <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Search</button>
          </form>
          <ul class=\"navbar-nav\" id=\"login\">
                <li class=\"nav-item\">
                    <a class=\"nav-link btn btn-outline-secondary btn-lg\" href=\"../Profile/profile2.php?ID=$user&&Status=Posted\" >Profile</a >
                </li>
          </ul>
          
        </div>
      </nav>
        
        
        <div class=\"card-columns\" id=\"manypets\">
        ");
            
?>
        <?php
        
        
    $mysqli = new mysqli("localhost", "findyourpet_meow_411", "meow_411", "findyourpet_PetGo");
    if(!$mysqli) {
        die('Could not connect: ' .mysql_error());
    }
    else{
        
        $age = $_POST["age"];
        $gender= $_POST["gender"];
        $sql = "";
        if (strcmp($age,"None")!=0){
            if (strcmp($age,"0-5")==0){
                $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id AND`Age` >= 0 AND `Age` <= 5 And `Gender` =" ;
                $sql.= "'".substr($gender,0,1)."'";
                if (strcmp($gender,"Unknown")==0){
                    $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id AND`Age` >= 0 AND `Age` <= 5";
                }
            }
            else if (strcmp($age,"6-10")==0){
                $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id AND`Age` >= 6 AND `Age` <= 10 And `Gender` =" ;
                $sql.= "'".substr($gender,0,1)."'";
                if (strcmp($gender,"Unknown")==0){
                    $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id AND`Age` >= 6 AND `Age` <= 10";
                }
            }
            else if (strcmp($age,"11-15")==0){
                $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id AND`Age` >= 11 AND `Age` <= 15 And `Gender` =" ;
                $sql.= "'".substr($gender,0,1)."'";
                if (strcmp($gender,"Unknown")==0){
                    $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id AND`Age` >= 11 AND `Age` <= 15";
                }
            }
            else if (strcmp($age,"16-20")==0){
                $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id AND`Age` >= 16 AND `Age` <= 20 And `Gender` =" ;
                $sql.= "'".substr($gender,0,1)."'";
                if (strcmp($gender,"Unknown")==0){
                    $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id AND`Age` >= 16 AND `Age` <= 20";
                }
            }
            
        }
        else{
            if (strcmp($gender,"Unknown")==0){
                $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id";
            }
            else{
                $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id And `Gender` =";
                $sql.= "'".substr($gender,0,1)."'";
            }
        }
        $user = $_GET["ID"];
        $res = mysqli_query($mysqli,$sql);
        if ($res){
            while ($row = mysqli_fetch_array($res)){
                print("<div class=\"card p-3\">
  <img class=\"card-img-top\" src=\"{$row['photo']}\" alt=\"No images\" onerror=\"this.src='../Default.jpg';\" align=\"middle\" style=\"width:350;height:350px;\">

  <div class=\"card-body\">
    <h5 class=\"card-title\">{$row['Species']}</h5>
    <a href=\"view.php?PETID={$row['id']}&&ID=$user\" class=\"btn btn-primary\">View</a>
  </div>
</div>");
                
                
                // echo $row['Species'] . " " . $row['Age']. " ".$row['Description']. " ".$row['Gender'] ;
                // echo "<br>";
            }
        }
        else{
            
            $user = $_GET["ID"];
            $sql = "SELECT * FROM `Searcher_History` WHERE Searcher_History.User_ID =".$user;
            //echo($sql);
            $res = mysqli_query($mysqli,$sql);
            if (mysqli_num_rows($res)==0){
                $sql_random = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id ORDER BY Age";
                $res_random = mysqli_query($mysqli,$sql_random);
                while ($row_random = mysqli_fetch_array($res_random)){
                    print("<div class=\"card p-3\" style=\"text-align:center;\">
  <img class=\"card-img-top\" src=\"{$row_random['photo']}\" alt=\"Card image cap\" style=\"width:350px;height:350px;\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">{$row_random['Species']}</h5>
    <a href=\"view.php?PETID={$row_random['id']}&&ID=$user\" class=\"btn btn-primary\">View</a>
  </div>
</div>");
                }
            }
            else{
            $Species_Array = array();
            $Age_Array = array();
            $Gender_Array = array();
            //array_count_values
            while ($row = mysqli_fetch_array($res)){
                $Petid = $row["Pet_ID"];
                $pet_sql = "SELECT * FROM `Pets` WHERE ID = ".$Petid;
                //echo($pet_sql);
                $res_pet = mysqli_query($mysqli,$pet_sql);
                while ($row_2 = mysqli_fetch_array($res_pet)){
                    $Species=$row_2["Species"];
                    array_push($Species_Array,$Species);
                    $Age = $row_2["Age"];
                    array_push($Age_Array,$Age);
                    $Gender=$row_2["Gender"];
                    array_push($Gender_Array,$Gender);
                    
                }
            }
            //print_r(array_count_values($Species_Array));
            //print_r(array_count_values($Age_Array));
            //print_r(array_count_values($Gender_Array));
            $Species_Array_sort = array_count_values($Species_Array);
            arsort($Species_Array_sort);
            $Species_allKeys = array_keys($Species_Array_sort);
            $Species_most = $Species_allKeys[0];
            
            $Age_Array_sort =array_count_values($Age_Array);
            arsort($Age_Array_sort);
            $Age_allKeys = array_keys($Age_Array_sort);
            $Age_most = $Age_allKeys[0];
            
            $Gender_Array_sort = array_count_values($Gender_Array);
            arsort($Gender_Array_sort);
            $Gender_allKeys = array_keys($Gender_Array_sort);
            $Gender_most = $Gender_allKeys[0];
            
            $species_sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id And Status = \"Available\" AND Pets.Species=\"".$Species_most."\" ORDER BY Age";
            $res_species = mysqli_query($mysqli,$species_sql);
            $row_cnt = mysqli_num_rows($res_species);
            if ($row_cnt>=30){
            while ($row_species = mysqli_fetch_array($res_species)){
                print("<div class=\"card p-3\" style=\"text-align:center;\">
  <img class=\"card-img-top\" src=\"{$row_species['photo']}\" alt=\"Card image cap\" style=\"width:350px;height:350px;\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">{$row_species['Species']}</h5>
    <a href=\"view.php?PETID={$row_species['id']}&&ID=$user\" class=\"btn btn-primary\">View</a>
  </div>
</div>");
            }
            }
            else{
                $Age_max = $Age_most+2;
                $Age_min = $Age_most-2;
                $other_sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID= pets_advance.id And Status = \"Available\" And Age >".$Age_min." And Age <".$Age_max." And Gender = "."'".substr($Gender_most,0,1)."' ORDER BY Age";
                $res_other = mysqli_query($mysqli,$other_sql);
                while ($row_other = mysqli_fetch_array($res_other)){
                    print("<div class=\"card p-3\" style=\"text-align:center;\">
  <img class=\"card-img-top\" src=\"{$row_other['photo']}\" alt=\"Card image cap\" style=\"width:350px;height:350px;\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">{$row_other['Species']}</h5>
    <a href=\"view.php?PETID={$row_other['id']}&&ID=$user\" class=\"btn btn-primary\">View</a>
  </div>
</div>");
                }
            }
        }    
        }
        
        
        
        
        mysql_close($mysqli);
    }
    
?>
</div>
    </body>
</html>