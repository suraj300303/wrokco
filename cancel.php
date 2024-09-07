<?php
    require('connection.php');
    session_start();
    $email = $_SESSION['email'];
    $pnr = $_POST['pnr'];

    /* Check the PNR is booked by respective User or not */
    $query = "select * from bookings where user='$email' and pnr='$pnr'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>=1){
        $query = "DELETE FROM `bookings` WHERE user='$email' and pnr='$pnr'";
        mysqli_query($conn,$query);
        echo "<script>alert('Ticket Cancelled with PNR: $pnr')
        location.href = 'MyBooking.php'</script>";
        die();
    }else{
        echo "<script>alert('Invalid PNR $type')
        location.href = 'MyBooking.php'</script>";
    }
    mysqli_close($conn);
?>