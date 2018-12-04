<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Find</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Home.css">
</head>
    <body>
        
    <?php 
    $mysqli = new mysqli("localhost", "findyourpet_meow_411", "meow_411", "findyourpet_PetGo");
    if(!$mysqli) {
        die('Could not connect: ' .mysql_error());
    }
    else{
        print("
        <nav class=\"navbar navbar-light bg-light\">
    <a class=\"navbar-item\" href=\"../home2.php?ID={$_GET['ID']}\" id=\"homeTitle\"><font color=\"#F5D2CA\">PetGo</font></a>
    
</nav>
        
        ");
        // echo 'Connected successfully';
        $emp_freetime = $_POST['freetime'];
        $emp_income = $_POST['income'];
        $emp_location = $_POST['location'];
        $emp_phonenum = $_POST['phonenumber'];
        $emp_user = $_GET['ID'];
        $emp_petid = $_GET['PET_ID'];
        $emp_status = "Pending";
    
        
        $sql = "INSERT INTO `Application` (`User_ID`,`Pets_ID`,`Free_Time`,`Income`,`Location`, `Phone`, `Status`) VALUES ('$emp_user','$emp_petid','$emp_freetime','$emp_income','$emp_location','$emp_phonenum','$emp_status')";
        
        
        $return = mysqli_query($mysqli, $sql);
        if($return){
            echo "Successful Apply!";
        }
        else{
            echo "Error: " . $sql . "<br>" . $return;
        }
        
        $app_sql = "SELECT COUNT(*) FROM `Application` WHERE Pets_id = $emp_petid";
        $app_count = mysqli_query($mysqli, $app_sql);
        $app_num = mysqli_fetch_array($app_count);
        
        if($app_num[0] >= 3){
            echo "<div>Enough people applied<div>";
            $advance_sql = "SELECT * FROM `Application` WHERE Pets_id=$emp_petid ORDER BY (Application.Free_Time+Application.Income/1000) DESC";
            $advance_exe = mysqli_query($mysqli, $advance_sql);
            $count = 0;
            // if ($cur = mysqli_fetch_array($advance_exe)){
            //     echo "\nUpdate success";
            //     $update_sql = "UPDATE `Application` SET Status = 'Success' WHERE Pet_id = $cur{'Pet_id'} AND User_id = $cur{'User_id'}";
            //     $update_exe = mysqli_query($mysqli, $update_sql);
            //     if($update_exe){
            //         echo "666";
            //     }
            //     else{
            //         echo "Error: " . $update_exe . "<br>" . $update_sql;
            //     }
            // }
            
            // else{
            //     echo "Error: " . $advance_exe . "<br>" . $cur;
            // }
            
            while($cur = mysqli_fetch_array($advance_exe)) {
                if ($count == 0){
                    $update_sql2 = "UPDATE `Application` SET Status = 'Success' WHERE Pets_id = $cur[1] AND User_id = $cur[0]";
                    $update_exe2 = mysqli_query($mysqli, $update_sql2);
                    $count++;
                    if($update_exe2){
                    // echo "666" . $update_sql2;
                    }
                    else{
                    echo "Error: " . $update_exe2 . "<br>" . $update_sql2;
                    }
                }
                else{
                    $update_sql2 = "UPDATE `Application` SET Status = 'Failed' WHERE Pets_id = $cur[1] AND User_id = $cur[0]";
                    $update_exe2 = mysqli_query($mysqli, $update_sql2);
                    $count++;
                    
                    if($update_exe2){
                    // echo "666" . $update_sql2;
                    }
                    else{
                    echo "Error: " . $update_exe2 . "<br>" . $update_sql2;
                    }
                }
            }
       
        }
        else if($app_num){
            echo "<div>Waiting for more people to apply.<div>";
        }
        else{
            
            echo "Error: " . $app_sql . "<br>" . $app_count;
        }
        
        echo "<div>Redirect in 5 seconds<div>";
        
        
        
        
        
    
        
        mysql_close($mysqli);
        // header('Refresh:5; URL=./search.php?ID={$_GET['ID']}');
    ?>
        <script type="text/javascript">
        setTimeout(function () {
   window.location.href= './search.php?ID=<?php echo($_GET["ID"]); ?>'; // the redirect goes here

},1000);
// window.location = "./search.php?ID=<?php echo($_GET["ID"]); ?>";
</script>  
     
    <?php
    }
    
?>
    </body>
</html>
