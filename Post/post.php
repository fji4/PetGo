<!DOCTYPE html>
<html>
    <body>
        <?php
    $mysqli = new mysqli("localhost", "findyourpet_meow_411", "meow_411", "findyourpet_PetGo");
    if(!$mysqli) {
        die('Could not connect: ' .mysql_error());
    }
    else{
        echo 'Connected successfully';
        $emp_species = $_POST['speices'];
        $emp_age = $_POST['age'];
        $emp_status = $_POST['status'];
        $emp_gender = $_POST['gender'];
        $user = $_GET["ID"];
        if($emp_gender === "female"){
            $emp_gender = "F";
        }
        
        $sql = "INSERT INTO `Pets` (`Species`,`Age`,`Status`,`Gender`,`User_ID`) VALUES ('$emp_species','$emp_age','$emp_status','$emp_gender','$user')";
        $return = mysqli_query($mysqli, $sql);
        if ($return) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $return;
        }
        
        $emp_losttime = '2018/09/05';
        $emp_descript = $_POST['description'];
        $emp_photo = $_POST['image'];
        $emp_location = $_POST['location'];
        
        
        
        
        $sql_advance = "INSERT INTO `pets_advance` (`lost_time`,`Description`,`photo`,`location`) VALUES (NULL,'$emp_descript','$emp_photo','$emp_location')";
        $return_advance = mysqli_query($mysqli, $sql_advance);
        if ($return_advance) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql_advance . "<br>" . $return_advance;
        }
        
        mysql_close($mysqli);
        ?>
<script type="text/javascript">
window.location = "../home2.php?ID=<?php echo($_GET["ID"]); ?>";
</script>      
    <?php
    }
    
?>
    </body>
</html>


