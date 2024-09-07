<?php
    require('connection.php');

    /* fetching source and destination stations to add or cancel the train */
    $query1 = "select station_code,station_name from stations";
    // $query2 = "select distinct(destination),dest_code from stations";

    $result1 = mysqli_query($conn,$query1);
    $result2 = mysqli_query($conn,$query1);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage_Event</title>
    <link rel="stylesheet" href="ManageEvent.css">
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="https://img.favpng.com/21/8/2/database-logo-png-favpng-AHZwNuJZ7YW8VpjPxL9xsx9wN.jpg" type="image/x-icon">
</head>
<body>
    <div class="container">
        <?php
            include('header.php');
            ?>
        <div class="main">
            <form class="box" id="add" method="post">
                <h3>Add Train to Schedule</h3> <hr>
                <label for="source">Source:</label>
                <select id="source" name = "source" onchange="updateDestination(this.value)">
                    <option value="none" selected disabled>--Select Source--</option>
                    <?php while ($row = mysqli_fetch_assoc($result1)): ?>
                        <option value="<?php echo $row['station_code']; ?>"> <?php echo $row['station_name']; ?> </option>
                        <?php endwhile; ?>
                    </select> <br>
                    
                    <label for="dest">Destination:</label>
                    <select id="dest" name="dest" onchange="updateSource(this.value)">
                    <option value="none" selected disabled>--Select Destination--</option>
                    <?php while ($row = mysqli_fetch_assoc($result2)): ?>
                        <option value="<?php echo $row['station_code']; ?>"> <?php echo $row['station_name']; ?> </option>
                    <?php endwhile; ?>
                </select> <br>
            
                <label for="trainNumber1">Train Number:</label>
                <input type="text" name="trainNumber1" placeholder="Enter train number" onkeypress="return onlyNumber(event)" minlength="5" maxlength="5" required> <br>

                <label for="trainName">Train Name: </label>
                <input type="text" name="trainName" placeholder="Enter train name: " onkeypress="return onlyLetter(event)" required> <br>
                
                <label for="fare">Fare(Rs):</label>
                <input type="text" name="fare" placeholder="Enter fare(Rs): " onkeypress="return onlyNumber(event)" required> <br>
                
                <label for="dist">Distance(KM):</label>
                <input type="text" name="dist" placeholder="Enter distance(KM): "  onkeypress="return onlyNumber(event)"required> <br>
                <button onclick="add()" >Add Train</button>
            </form>
            <div class="box1">
                <h3>Cancel Train from Schedule</h3>
                    <hr>
                <form id="cancel" method="post">
                    <label for="trainNumber2">Train Number:</label>
                    <input type="text" name="trainNumber2" placeholder="Enter train number" onkeypress="return onlyNumber(event)" minlength="5" maxlength="5" required> <br>
                    <button  onclick="cancel()" >Cancel Train</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function updateDestination(selectedValue) {
        const destinationSelect = document.getElementById("dest");
        for (let option of destinationSelect.options) {
            if (option.value === selectedValue) {
                option.disabled = true;
            } else {
                option.disabled = false;
            }
        }
    }

    function updateSource(selectedValue) {
        const sourceSelect = document.getElementById("source");
        for (let option of sourceSelect.options) {
            if (option.value === selectedValue) {
                option.disabled = true;
            } else {
                option.disabled = false;
            }
        }
    }

    function cancel(){
        var x = confirm("Are you sure to cancel this train from schedule");
        if(x == false){
            return;
        }else{
            document.getElementById('cancel').action = "cancelTrain.php";
        }
    }
    function add(){
        var x = confirm("Are you sure to add this train in schedule");
        if(x == false){
            return;
        }else{
            document.getElementById('add').action = "addTrain.php";
        }
    }
</script>
</html>