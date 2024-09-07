<?php
    require('connection.php');
    $src = $_POST['source'];
    $dest = $_POST['dest'];
    $train_no = $_POST['trainNumber1'];
    $train_name = $_POST['trainName'];
    $fare = $_POST['fare'];
    $dist = $_POST['dist'];

    $q1 = "SELECT station_name FROM `stations` WHERE station_code = '$src'";
    $q2 = "SELECT station_name FROM `stations` WHERE station_code = '$dest'";
    $r1 = mysqli_query($conn,$q1);
    $r2 = mysqli_query($conn,$q2);

    $row1 = mysqli_fetch_row($r1);
    $row2 = mysqli_fetch_row($r2);

    $query = "INSERT INTO trains(`source`, `src_code`, `destination`, `dest_code`, `train_name`, `train_code`, `fare`, `distance`, `boarding_stn`) VALUES ('$row1[0]','$src','$row2[0]','$dest','$train_name','$train_no','$fare','$dist','STN_1')";

    try{
        mysqli_query($conn,$query);
        echo "<script>alert('Train Added to Schedule');
        location.href = 'ManageEvent.php'</script>";
    }catch(mysqli_sql_exception $e){
        if ($e->getCode() == 1062) { 
            echo "<script>alert('Train is already in schedule');location.href = 'ManageEvent.php'</script>";
            die();
        } else {
            echo "Database error: " . $e->getMessage();
        }
    }finally{
        mysqli_close($conn);
    }
?>