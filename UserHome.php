<?php
    require('connection.php');
    session_start(); 
    session_write_close();
    if (isset($_SESSION['email'])) { 
        $email = $_SESSION['email'];

        /* Fetching all History of User */
        $query = "select * from bookings where user='$email';";
        $result1 = mysqli_query($conn,$query);
        $query = "select distinct(source),src_code from trains";
        $result = mysqli_query($conn,$query);
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello_User</title>
    <link rel="stylesheet" href="userhome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="shortcut icon" href="https://e7.pngegg.com/pngimages/550/997/png-clipart-user-icon-foreigners-avatar-child-face.png" type="image/x-icon">
</head>
<body onload="setDate()">
<div class="background"></div> 
    <div class="container" id="container">
        <header>
            <div class="logo">
                <img src="images/user.png" alt="">
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
        <div class="mainContent">
            <div class="left">
                <form >
                    <h3>Start Your Journey </h3>
                    <hr>
                    <label for="source">Source:</label>
                    <select id="source" name="source" required>
                        <option value="none" selected disabled>--Select Source--</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <option value="<?php echo $row['src_code']; ?>"> <?php echo $row['source']; ?> </option>
                        <?php endwhile; ?>
                    </select> <br>
            
                    <label for="dest">Destination:</label>
                    <select id="dest" name="dest" required>
                        <option value="none" selected disabled>--Select Destination--</option>
                        <option value="PNBE">Patna</option>
                        <option value="DNR">Danapur</option>
                        <option value="GNT">Guntur</option>
                        <option value="DLE">Delhi</option>
                    </select> <br>
                    <label for="date">Choose Date: </label>
                    <input type="date" name="date" id="date">
                    <input type="submit" value="Search Train">
                </form>
            </div>
            <div class="right">
                <h2>My Recent Bookings: </h2>
                <hr>
                <table >
                    <tr>
                        <th>PNR</th>
                        <th>Date</th>
                        <th>Source</th>
                        <th>Destination</th>
                    </tr>
                    <?php
                    foreach($result1 as $row){?>
                        <tr>
                        <td><?php echo $row["pnr"] ?></td>
                        <td><?php echo $row["reservation_date"] ?></td>
                        <td><?php echo $row["source"] ?></td>
                        <td><?php echo $row["destination"] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <a href="MyBooking.php">More</a>
            </div>
        </div>
        <h2>Famous places to visit: </h2>
        <div class="places">
            <div class="boxes">
                <a href="https://www.thomascook.in/blog/places-to-visit-in-bangalore"><img src="https://www.fabhotels.com/blog/wp-content/uploads/2019/01/Goa.jpg" alt=""></a>
                <div class="footer">
                    Baga beach, Goa
                </div>
            </div>
            <div class="boxes">
                <a href="https://www.thomascook.in/blog/places-to-visit-in-bangalore"><img src="https://www.thomascook.in/blog/wp-content/uploads/2017/09/Untitled-design-min.png" alt=""></a>
                <div class="footer">
                    Shiva Temple,Bengaluru
                </div>
            </div>
            <div class="boxes">
                <a href="https://www.thomascook.in/blog/places-to-visit-in-bangalore"><img src="https://blog.thomascook.in/wp-content/uploads/2020/10/01-manali.jpg" alt=""></a>
                <div class="footer">
                    Kullu Manali, Himachal Pradesh
                </div>
            </div>
        </div>
        <div class="places">
            <div class="boxes">
                <a href="https://www.thomascook.in/blog/places-to-visit-in-bangalore"><img src="https://indiacsr.in/wp-content/uploads/2022/07/India-Gate.jpg" alt=""></a>
                <div class="footer">
                    India Gate, Delhi
                </div>
            </div>
            <div class="boxes">
                <a href="https://www.thomascook.in/blog/places-to-visit-in-bangalore"><img src="https://images.livemint.com/img/2022/10/23/600x338/kedarnath_temple_1646126298235_1666491163241_1666491163241.jpg" alt=""></a>
                <div class="footer">
                    Kedharnath Temple
                </div>
            </div>
            <div class="boxes">
                <a href="https://www.thomascook.in/blog/places-to-visit-in-bangalore"><img src="https://www.planetware.com/wpimages/2019/11/india-best-places-to-visit-agra.jpg" alt=""></a>
                <div class="footer">
                    Tajmahal, Agra
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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
    function setDate(){
        let today = new Date();
        let d = today.getDate().toString();
        let m = (today.getMonth()+1).toString();
        let y = today.getFullYear()-14;
        if(parseInt(d) < 10)
            d = '0'+d;
        if(parseInt(m)<10)
            m = '0'+m;
        const max_date = y+'-'+m+'-'+d;
        document.getElementById('date').min = max_date;
    }
</script>
</html>