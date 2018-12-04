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
        $emp_uname = $_POST['uname'];
        $emp_psw = $_POST['psw'];
        $emp_phone = $_POST['phone'];
        
        
        $sql = "INSERT INTO `User` (`Name`,`Phone`,`Password`) VALUES ('$emp_uname','$emp_phone','$emp_psw')";
        
        // $sql = "INSERT INTO `Pets` (`Species`,`Age`,`Status`,`Gender`) VALUES ('$emp_species','$emp_age','$emp_status','$emp_gender')";
        $return = mysqli_query($mysqli, $sql);
        if ($return) {
            echo "New record created successfully";
        } else {
            print("<script type=\"text/javascript\">
            alert(\"\Failed to register!!\");
            
            </script>");
        }
        $nsql = "SELECT * FROM `User` WHERE User.Name = '$emp_uname' AND User.Password = '$emp_psw' ";
         $nreturn = mysqli_query($mysqli, $nsql);
        if($row = mysqli_fetch_array($nreturn)){
             print("
            <script type=\"text/javascript\">
            window.location.replace(\"\home2.php?ID={$row{"ID"}}\");
            </script>
        ");
            
        }
        else{
            print("<script type=\"text/javascript\">
            window.location.replace(\"\Home.php\");
            
            </script>");
            
        }
        
        
    
        
        mysql_close($mysqli);
    ?>
        
     
    <?php
    }
    
?>
    </body>
</html>

