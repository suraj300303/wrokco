<?php
    include("connection.php");
    
    /* fetching all the boarding stations between source and destination station */
    $src_id =   $_POST['src_id'];
    $dest_id =   $_POST['dest_id'];
    $query = "select boarding_stn from trains where src_code='$src_id' and dest_code='$dest_id';";
    $result = mysqli_query($conn, $query);
    $output = '<option selected disabled>--Select Train--</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<option value="' . $row['boarding_stn'] . '">' . $row['boarding_stn'] . '</option>';
    }
    $output .= '<option value="' .$src_id . '">' . $src_id . '</option>';
    $output .= '<option value="' .$dest_id . '">' . $dest_id . '</option>';
    echo $output;
?>