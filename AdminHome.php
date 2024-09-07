<?php
    require('connection.php');
    /* find number of user and number of bookings */
    // if(i($_SESSION)){
    //     header('Location: AdminLogin.php');
    // }
    $query1 = "select count(*) from user";
    $query2 = "select count(*) from bookings";
    $query3 = "select count(*) from trains";
    $query4 = "select sum(total_fare) from bookings";
    
    $res1 = mysqli_query($conn,$query1);
    $res2 = mysqli_query($conn,$query2);
    $res3 = mysqli_query($conn,$query3);
    $res4 = mysqli_query($conn,$query4);

    $row1 = mysqli_fetch_row($res1);
    $row2 = mysqli_fetch_row($res2);
    $row3 = mysqli_fetch_row($res3);
    $row4 = mysqli_fetch_row($res4);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello_Admin</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="AdminHome.css?key=<?php echo time(); ?>">
    <link rel="shortcut icon" href="images/adminFav.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <?php
        include('header.php');
        ?>
        <div class="main">
            <div class="box">
                <h5># of Registered User</h5>
                <span> <?php echo $row1[0]?>
            </div>
            <div class="box">
                <h5># of Bookings</h5>
                <span> <?php echo $row2[0]?>
            </div>
            <div class="box">
                <h5># of Running Trains</h5>
                <span> <?php echo $row3[0]?>
            </div>
            <div class="box">
                <h5>Total Revenue</h5>
                <span> &#8377; <?php echo $row4[0]?>
            </div>
        </div>
        <h2>Partner companies</h2>
        <div class="journey">
            <div class="logo">
                <img src="https://th.bing.com/th/id/R.2ca4eaa2872696e0be6f57b95d6adec0?rik=TgQ323x6RJSuWQ&riu=http%3a%2f%2fassets.stickpng.com%2fimages%2f587b511a44060909aa603a81.png&ehk=kwczFcdDqzd%2fStMKcLyswMqscmIbujjqXLbky92Fu8M%3d&risl=&pid=ImgRaw&r=0">
            </div>
            <div class="logo">
                <img src="https://www.nicepng.com/png/full/247-2478362_make-my-trip-logo-png-free-image-download.png">
            </div>
            <div class="logo">
                <img src="https://blog.couponmoto.com/wp-content/uploads/2022/03/goibibo-logo-768x237.png">
            </div>
            <div class="logo">
                <img src="https://alchetron.com/cdn/ministry-of-transport-malaysia-152c122b-3564-4e2b-8377-5b74bf88cfa-resize-750.png">
            </div>
            <div class="logo">
                <img src="https://www.easemytrip.com/images/train-img/IRCTC-logo-nw.png">
            </div>
        </div>
        <div class="review">
            <h2>Customer Reviews</h2>
            <div class="rev">
                <h4>aa@gmail.com</h4>
                <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure dignissimos soluta deserunt et officia nemo facilis magni repellat sed atque architecto, nulla quibusdam quod, mollitia totam debitis. Iusto, minima autem!</p>
            </div>
            <div class="rev">
                <h4>Prabhat Kumar</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum deserunt ipsa eius incidunt ea voluptatem velit, voluptas inventore, iste nisi, minima illum quae officia. Voluptates illum blanditiis officia illo. Perspiciatis!</p>
            </div>
            <div class="rev">
                <h4>userName2</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur error illum aut quidem sunt quam sint laboriosam sit tempore autem est harum minus quos repudiandae rem voluptas, dolorum delectus esse.</p>
            </div>
            <div class="rev">
                <h4>userName3</h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus quasi distinctio debitis rerum provident non, placeat vitae totam. Iure dicta harum repellat officia vitae distinctio, blanditiis vero libero atque dignissimos.</p>
            </div>
        </div>
    </div>
    <footer>
        @copyright 2021-2025 www.makemyticket.com/owned
    </footer>
</body>
</html>