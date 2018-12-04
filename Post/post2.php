<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
    <link rel="stylesheet" type="text/css" href="post.css">
    <script src="post.js"></script>
</head>
<body style="background:#ffe6e6; text-align:center;">
<h2>Post</h2>

<form action="post.php?ID=<?php print($_GET["ID"]); 
    ?>" style="align:center;" method="POST">
    
    <h2>Pet Information</h2>
    Species:<br>
    <input type="text" name="speices" required>
    <br><br>
    Age:<br>
    <input type="number" name="age">
    <br><br>
    Status:<br>
    <select name="status">
        <option value="Available">Available</option>
        <option value="Unavailable">Unavailable</option>
    </select>
    <br><br>
    Gender:<br>
    <select name="gender">
        <option value="female">female</option>
        <option value="male">male</option>
    </select>
    
    <br><br>
    Location:<br>
    <input type="text" name="location" href="../Home.html">
    
    <br><br><br><br>
    <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
          </div>
    <br><br><br>

    <input type="submit" value="Submit" id="formSubmit">
    
    
</form>
<br><br>
</body>
</html>