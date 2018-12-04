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
        $id = $_GET['ID'];
        $emp_species = $_POST['speices'];
        $emp_age = $_POST['age'];
        $emp_status = $_POST['status'];
        $emp_gender = $_POST['gender'];
        
        if($emp_gender === "female"){
            $emp_gender = "F";
        }
        
        $sql = "UPDATE `Pets` SET 
            Species = '$emp_species',
            Age = '$emp_age',
            Status = '$emp_status',
            Gender = '$emp_gender' WHERE Pets.id = $id";
        $return = mysqli_query($mysqli, $sql);
        if ($return) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $return;
        }
        
        $emp_losttime = $_POST['losttime'];
        $emp_descript = $_POST['description'];
        $emp_photo = $_POST['image'];
        $emp_location = $_POST['location'];
        
        
        
        
        $sql_advance = "UPDATE `pets_advance` SET 
            lost_time = '$emp_losttime',
            Description = '$emp_description',
            photo = '$emp_photo',
            location = '$emp_location' WHERE pets_advance.id = $id";
        $return_advance = mysqli_query($mysqli, $sql_advance);
        if ($return_advance) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql_advance . "<br>" . $return_advance;
        }
        
        mysql_close($mysqli);
        ?>
<script type="text/javascript">
window.location = "../Home.html";
</script>      
    <?php
    
    }
    
?>
    </body>
</html>


