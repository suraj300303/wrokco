<?php
    include("connection.php");
    
    /* fetching all the destination station when a source is selected */
    $src_id =   $_POST['source_data'];
    $query = "select distinct(destination),dest_code from trains where src_code='$src_id';";
    $result = mysqli_query($conn, $query);
    $output = '<option selected disabled>--Select Destination--</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<option value="' . $row['dest_code'] . '">' . $row['destination'] . '</option>';
    }
    echo $output;
?>