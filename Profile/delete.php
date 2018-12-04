<?php
    $mysqli = new mysqli("localhost", "findyourpet_meow_411", "meow_411", "findyourpet_PetGo");
    if(!$mysqli) {
        die('Could not connect: ' .mysql_error());
    }
    else{
        $id = $_POST["id"];
        if (empty($id)){
            print("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>DeleteSuccess</title>
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\">

    <link rel=\"stylesheet\" type=\"text/css\" href=\"delete.css\">

</head>
<body style=\"background:#ffe6e6; text-align:center;\">
    <nav class=\"navbar navbar-expand-lg navbar-light\" style=\"background-color: #ffe6e6;\">
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarTogglerDemo01\" aria-controls=\"navbarTogglerDemo01\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"navbar collapse navbar-collapse\" id=\"navbarTogglerDemo01\">
          <a class=\"navbar-brand petgoTitle\" href=\"../Home.html\"><font color = \"white\">PetGo</font></a>

        </div>
      </nav>
<h2>Please enter valid ID!</h2>
</body>");
        }
        else{
            
        
        $sql1 = "DELETE FROM `Pets` WHERE `id` ="."'".$id."'";
        $sql2 = "DELETE FROM `pets_advance` WHERE `id` ="."'".$id."'";
        $res1 = mysqli_query($mysqli,$sql1);
        $res2 = mysqli_query($mysqli,$sql2);
        
        if ($res1 && $res2){
            print("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>DeleteSuccess</title>
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\">

    <link rel=\"stylesheet\" type=\"text/css\" href=\"delete.css\">

</head>
<body style=\"background:#ffe6e6; text-align:center;\">
    <nav class=\"navbar navbar-expand-lg navbar-light\" style=\"background-color: #ffe6e6;\">
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarTogglerDemo01\" aria-controls=\"navbarTogglerDemo01\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"navbar collapse navbar-collapse\" id=\"navbarTogglerDemo01\">
          <a class=\"navbar-brand petgoTitle\" href=\"../Home.html\"><font color = \"white\">PetGo</font></a>

        </div>
      </nav>
<h2>Delete Success!</h2>
</body>");
            
        }
        
        }

    }
    
?>