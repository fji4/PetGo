<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
</head>
<body style="background:#ffe6e6; text-align:center;">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffe6e6;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar collapse navbar-collapse" id="navbarTogglerDemo01">
            <?php
            $user = $_GET["ID"];
            print("<a class=\"navbar-brand petgoTitle\" href=\"../home2.php?ID=$user\"><font color = \"white\" size = \"8\" face = \"Bradley Hand\">PetGo</font></a>");
          ?>
        </div>
      </nav>
<h2>Application</h2> <br>

<form action="./application.php?ID=<?php echo $_GET["ID"] ?>&&PET_ID=<?php echo $_GET["PET_ID"] ?>" style="align:center;" method="POST">
    
    <h2></h2>
    <div style="width:50%; margin: 0 20%;">
    
        <div class="form-group row">
            <label for="freetime" class="col-sm-2 col-form-label">Free Time:</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="Freetime" placeholder="hour(s)/ day" name="freetime" required>
            </div>
        </div>
        <div class="form-group row">
          <label for="income" class="col-sm-2 col-form-label">Income:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="Income" placeholder="dollars/ year" name="income" required>
          </div>
        </div>
        <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label">Location:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Location" placeholder="Chicago downtown" name="location" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="phonenumber" class="col-sm-2 col-form-label">Phone Number:</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" id="Phonenumber" placeholder="(xxx)xxx-xxxx" name="phonenumber" required>
            </div>
          </div>
    
    </div>
    <input type="submit" class="btn btn-primary mb-2" value="Submit">
</form>
</body>
</html>