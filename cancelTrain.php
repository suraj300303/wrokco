<?php
    require('connection.php');
    $train_no = $_POST['trainNumber2'];
    $query = "DELETE FROM trains WHERE train_code = $train_no";
    $res = mysqli_query($conn,$query);
    if($res==1) {
        echo "<script>alert('Train removed from schedule')</script>";
        echo "<script>location.href = 'ManageEvent.php'</script>";
    }
    else {
        echo "'Train is not in the schedule'";
    }
?>