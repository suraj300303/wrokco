<?php
    require('connection.php');
    session_start(); 
    if (isset($_SESSION['email'])) { 
        $email = $_SESSION['email'];

        /* Fetching all History of User */
        $query = "select * from bookings where user='$email';";
        $result1 = mysqli_query($conn,$query);
        $query = "select distinct(source),src_code from trains";
        $result = mysqli_query($conn,$query);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Bookings</title>
  <link rel="stylesheet" href="myBooking.css?key=<?php echo time(); ?>">
  <link rel="shortcut icon"
    href="https://e7.pngegg.com/pngimages/550/997/png-clipart-user-icon-foreigners-avatar-child-face.png"
    type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="container">
    <header>
      <div class="logo">
        <img src="Images/User.png" alt="">
      </div>
      <nav>
        <ul>
          <li><a href="UserHome.php">Home</a></li>
          <li><a href="MyBooking.php">My Bookings</a></li>
          <li><a href="myProfile.php">My Profile</a></li>
          <li><a href="UserLogin.php">Logout</a></li>
        </ul>
      </nav>
    </header>
    <div id="navbar">
      <div class="options">
        <img src="https://cdn-icons-png.flaticon.com/512/3267/3267459.png" /> <label onclick="bookTicket()"
          class="single">Book Ticket</label>

      </div>
      <div class="options">
        <img
          src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/344/external-transaction-history-online-money-service-flaticons-lineal-color-flat-icons-2.png" />
        <label onclick="history()" class="single">History</label>
      </div>
      <div class="options">
        <img
          src="https://img.icons8.com/external-soft-fill-juicy-fish/60/000000/external-tick-customer-feedback-soft-fill-soft-fill-juicy-fish-2.png" />
        <label onclick="Ticketstatus()" class="single">Ticket Status</label>
      </div>
      <div class="options">
        <img src="https://cdn-icons-png.flaticon.com/512/2100/2100803.png" /> <label onclick="cancelTicket()"
          class="single">Cancel Ticket</label>
      </div>
    </div>
    <div class="book-ticket" id="book">
      <form action="bookTicket.php" method="post">
        <div class="input-field">
          <label for="source">Source:</label>
          <select id="source" name="source" required>
            <option value="none" selected disabled>--Select Source--</option>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <option value="<?php echo $row['src_code']; ?>"> <?php echo $row['source'] ?> </option>
            <?php endwhile ?>
          </select>
        </div>
        <div class="input-field">
          <label for="dest">Destination:</label>
          <select id="dest" name="dest" required>
            <option value="none" selected disabled>--Select Destination--</option>
          </select>
        </div>
        <div class="input-field">
          <label for="date">Date: </label>
          <input type="date" name="date" id="date" required>
        </div>
        <div class="input-field">
          <label for="count">No.of Ticket: </label>
          <input type="number" name="count" id="count" min="0" placeholder="age: above 14year" required>
        </div>
        <div class="input-field">
          <label for="board">Boarding Stn: </label>
          <select id="board" name="board"  required>
            <option value="none" selected disabled>--Board Here--</option>
          </select>
        </div>
        <div class="input-field">
          <label for="train">Train:</label>
          <select id="train" name="train" required>
            <option value="none" selected disabled>--Select Train--</option>
          </select>
        </div>
        <div class="input-field" style="text-align: center;">
          <button type="submit" id="booknow">Book Now</button>
        </div>
      </form>
    </div>
    <div class="book-history" id="history">
      <table border="1">
        <tr>
          <th>PNR</th>
          <th>Date</th>
          <th>Source</th>
          <th>Boarding Stn.</th>
          <th>Destination</th>
          <th>Total Fare</th>
        </tr>
          <?php
          foreach($result1 as $row){?>
            <tr>
              <td><?php echo $row["pnr"] ?></td>
              <td><?php echo $row["reservation_date"] ?></td>
              <td><?php echo $row["source"] ?></td>
              <td><?php echo $row["destination"] ?></td>
              <td><?php echo $row["boarding"] ?></td>
              <td><?php echo $row["total_fare"] ?></td>
            </tr>
          <?php
          }
          ?>
      </table>
    </div>
    <div class="ticket-status" id="status">
      <table border="1">
        <tr>
          <th>PNR No.</th>
          <th>Total Fare</th>
          <th>Status</th>
        </tr>
        <?php
        $timestamp1 = strtotime(date('Y-m-d'));
        foreach($result1 as $row){
          $timestamp2 = strtotime($row["reservation_date"]);
          ?>
          <tr>
            <td><?php echo $row["pnr"] ?></td>
            <td><?php echo $row["total_fare"] ?></td>
            <td><?php echo ($timestamp1 > $timestamp2) ? "Completed" : "Waiting"?></td>
          </tr>
        <?php
        }
        ?>
      </table>
    </div>
    <form class="cancel-ticket" id="cancel" action="cancel.php" method="post">
      <div class="input-field">
        <label for="pnr">Enter PNR: </label>
        <input type="number" name="pnr" id="pnr">
      </div>
      <input type="submit" value="Cancel Ticket">
    </form>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  const dateInput = document.getElementById("date");
  const today = new Date().toISOString().split('T')[0];
  dateInput.setAttribute("min", today);
  function bookTicket() {
    document.getElementById('book').style.display = "flex";
    document.getElementById('history').style.display = "none";
    document.getElementById('status').style.display = "none";
    document.getElementById('cancel').style.display = "none";
  }
  function cancelTicket() {
    document.getElementById('book').style.display = "none";
    document.getElementById('history').style.display = "none";
    document.getElementById('status').style.display = "none";
    document.getElementById('cancel').style.display = "flex";
    return false;
  }
  function history() {
    document.getElementById('book').style.display = "none";
    document.getElementById('history').style.display = "block";
    document.getElementById('status').style.display = "none";
    document.getElementById('cancel').style.display = "none";
    return false;
  }
  function Ticketstatus() {
    document.getElementById('book').style.display = "none";
    document.getElementById('history').style.display = "none";
    document.getElementById('status').style.display = "flex";
    document.getElementById('cancel').style.display = "none";
    return false;
  }
  $('#source').on('change', function() {
    var src_code = this.value;
    $.ajax({
        url: 'getDestination.php',
        type: "POST",
        data: {
            source_data: src_code
        },
        success: function(result) {
            $('#dest').html(result);
        }
    })
  });
  $('#dest').on('change', function() {
    var src_code = document.getElementById('source').value;
    var dest_code = this.value;
    $.ajax({
        url: 'getTrain.php',
        type: "POST",
        data: {
            src_id: src_code,
            dest_id : dest_code
        },
        success: function(result) {
            $('#train').html(result);
        }
    })
  });
  $('#dest').on('change', function() {
    var src_code = document.getElementById('source').value;
    var dest_code = document.getElementById('dest').value;
    $.ajax({
        url: 'getBoarding.php',
        type: "POST",
        data: {
            src_id: src_code,
            dest_id : dest_code
        },
        success: function(result) {
            $('#board').html(result);
        }
    })
  });
</script>
</html>