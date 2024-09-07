<?php
    require('connection.php');
    session_start();
    $email = $_SESSION['email'];
    $src = $_POST['source'];
    $dest = $_POST['dest'];
    $date = $_POST['date'];
    $count = $_POST['count'];
    $board = $_POST['board'];
    $currentDate = date('Y-m-d');
    $currentTime = date('H:i:s');
    $train = $_POST['train'];
    
    /* finding fare from source to destination  */
    $query = "select fare from trains where src_code='$src' and dest_code='$dest';";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_row($result);
    $fare = $row[0]*$count;
    $uniquePNR = '';
    $existingPNRs = [];
    while (true) {
        $uniquePNR = generateRandomPNR();
        if (in_array($uniquePNR, $existingPNRs)) {
            continue;
        } else {
            $existingPNRs[] = $uniquePNR;
            break;
        }
    }
    /* Testing all the data;
    echo "<h2>User: $email</h2>";
    echo "<h2>PNR: $uniquePNR</h2>";
    echo "<h2>Source: $src</h2>";
    echo "<h2>Destination: $dest</h2>";
    echo "<h2>Reservation: $date</h2>";
    echo "<h2>Booking: $currentDate $currentTime</h2>";
    echo "<h2>Count: $count</h2>";
    echo "<h2>Total: $fare</h2>";
    echo "<h2>Boarding: $board</h2>";
    */

    /* Inserting Your Bookings in Database */
    $query = "insert INTO `bookings`(`user`, `pnr`, `source`, `destination`, `reservation_date`, `booking_time`, `count`, `total_fare`, `boarding`,`train`) VALUES ('$email','$uniquePNR','$src','$dest','$date','$currentDate $currentTime','$count','$fare','$board','$train');";

    if(mysqli_query($conn,$query)){
        echo "<script>alert('Ticket Booked: $uniquePNR(Note: Take screenshot of PNR)')
        location.href='MyBooking.php'</script>";
    }else{
        $error = mysqli_error($conn);
        echo "<script>alert('Error: $error)
        location.href='MyBooking.php'</script>";
    }
?>

<?php
    function generateRandomPNR($length = 10) {
        $characters = '0123456789';
        $pnr = '';
        while (strlen($pnr) < $length) {
            $pnr .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $pnr;
    }
?>