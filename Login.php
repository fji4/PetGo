<!DOCTYPE html>
<html>
    <body>
        
    <?php 
    $mysqli = new mysqli("localhost", "findyourpet_meow_411", "meow_411", "findyourpet_PetGo");
    if(!$mysqli) {
        die('Could not connect: ' .mysql_error());
    }
    else{
        //echo 'Connected successfully';
        $emp_uname = $_POST['uname'];
        $emp_psw = $_POST['psw'];
        
        $sql = "SELECT * FROM `User` WHERE User.Name = '$emp_uname' AND User.Password = '$emp_psw' ";
        
        // $sql = "INSERT INTO `Pets` (`Species`,`Age`,`Status`,`Gender`) VALUES ('$emp_species','$emp_age','$emp_status','$emp_gender')";
        $return = mysqli_query($mysqli, $sql);
        if ($return) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $return;
        }
        
        if($row = mysqli_fetch_array($return)){
            $the_id=$row{"ID"};
             if($the_id==101){
             print("
            <script type=\"text/javascript\">
            window.location.replace(\"\Profile/profile.php\");
            </script>
        ");
             }
             else{
                 print("
            <script type=\"text/javascript\">
            window.location.replace(\"\home2.php?ID={$the_id}\");
            </script>
        ");
             }
            
        }
        else{
            print("<script type=\"text/javascript\">
            window.location.replace(\"\Home.php\");
            alert(\"Wrong password or username\");
            </script>");
            
        }
        
        
    
        
        mysql_close($mysqli);
    ?>
        
     
    <?php
    }
    
?>
    </body>
</html>

