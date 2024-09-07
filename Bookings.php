<?php
    require('connection.php');
    /* fetching all the booking from database */
    $query = "select * from bookings";
    $result = mysqli_query($conn,$query);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All_Bookings</title>
    <link rel="stylesheet" href="allBookings.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="shortcut icon" href="https://previews.123rf.com/images/putracetol/putracetol1808/putracetol180801039/106388534-diagram-database-logo-icon-design.jpg" type="image/x-icon">
</head>
<body>
    <div class="container">
        <?php
            include('header.php');
        ?>
        <div class="main">
            <table border="1">
                <tr>
                    <th>S.No.</th>
                    <th>Username</th>
                    <th>PNR</th>
                    <th>Train No.</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Date</th>
                    <th>Total Fare(Rs)</th>
                </tr>
                <?php
                    $count = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $count += 1;
                ?>
                <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row['user']?></td>
                    <td><?php echo $row['pnr']?></td>
                    <td><?php echo $row['train']?></td>
                    <td><?php echo $row['source']?></td>
                    <td><?php echo $row['destination']?></td>
                    <td><?php echo $row['reservation_date']?></td>
                    <td><?php echo $row['total_fare']?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>