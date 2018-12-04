<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
    <link rel="stylesheet" type="text/css" href="../Post/post.css">
</head>
<body style="background:#ffe6e6; text-align:center;">
<h2>Update</h2>
<h2>Pet Information</h2>

<?php
 $mysqli = new mysqli("localhost", "findyourpet_meow_411", "meow_411", "findyourpet_PetGo");
    if(!$mysqli) {
        die('Could not connect: ' .mysql_error());
    }
    else{
        $id = $_GET["ID"];
        // echo $id;
        $sql = "SELECT * FROM `Pets`,`pets_advance` WHERE Pets.ID = pets_advance.id And Pets.ID= $id";
        // echo $sql;
        $res = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($res);
        // echo $row["Gender"];
    }

print("

<form action=\"update.php?ID={$id}\" style=\"align:center;\" method=\"POST\">
    
    Species:<br>
    <input type=\"text\" name=\"speices\" value={$row["Species"]}>
    <br><br>
    Age:<br>
    <input type=\"number\" name=\"age\" value={$row["Age"]}>
    <br><br>
    Status:<br>
    <select name=\"status\">
        <option value=\"Available\">Available</option>
        <option value=\"Unavailable\">Unavailable</option>
    </select>
    <br><br>
    Gender:<br>
    <select name=\"gender\">
        <option value=\"female\">female</option>
        <option value=\"male\">male</option>
    </select>
    <br><br>
    Lost time:<br>
    <input type=\"date\" name=\"losttime\" value={$row["lost_time"]}>
    <br>
    Image Link:<br>
    <input type=\"url\" name=\"image\" value={$row["photo"]}>
    
    <br>
    Location:<br>
    <input type=\"text\" name=\"location\" value={$row["location"]}>
    
    <br><br><br><br>
    <div class=\"form-group\">
            <label for=\"exampleFormControlTextarea1\">Description</label>
            <textarea class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"3\" name=\"description\">{$row["description"]}</textarea>
          </div>
    <br><br><br>

    <input type=\"submit\" value=\"Update\" id=\"formSubmit\">
    <a href=\"profile.php\" class=\"btn btn-primary\">Cancel</a>
</form>");

?>

</body>
</html>