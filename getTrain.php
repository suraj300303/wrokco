<?php
    include("connection.php");
    
    /* fetching all the trains between source and destination station */
    $src_id =   $_POST['src_id'];
    $dest_id =   $_POST['dest_id'];
    $query = "select train_name,train_code from trains where src_code='$src_id' and dest_code='$dest_id';";
    $result = mysqli_query($conn, $query);
    $output = '<option selected disabled>--Select Train--</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<option value="' . $row['train_code'] . '">' . $row['train_name'] . '</option>';
    }
    echo $output;
?>