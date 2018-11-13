<?php
    $random = $_POST['random'];

    include ("dbconnect.php");
    $sql = "SELECT * FROM color WHERE idx = '".$random."' "; 
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    header('Content-Type: application/json');

    $groupData = array();
    $groupData["red"] = $row["red"];
    $groupData["green"] = $row["green"];
    $groupData["blue"] = $row["blue"];
    $groupData["lightness"] = $row["lightness"];

    $output =  json_encode($groupData);
 
    // 출력
    echo  urldecode($output);
    mysqli_close($con);
?>
