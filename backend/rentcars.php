<?php
include_once "_common.php";
if(isset($_GET['sessionid']) && isset($_GET['days']) && isset($_GET['dfrom']))
{
    $_status = session_verification($_GET['sessionid']);
    if($_status['result'] == 'success')
    {
        $insert_sql = "INSERT INTO `rent`(`vmodel`, `email`, `days`, `dfrom`) VALUES ('{$v_model}','{$_status['data']['email']}','{$days}','{$dfrom}')";
        if(mysqli_query($conn, $insert_sql)){
            echo json_encode(["result"=>"success", "message"=>"Car Booked"]);exit();
        }else{
            echo json_encode(["result"=>"error", "message"=>"Not booked"]);exit();
        }
    }
    echo json_encode(["result"=>"error", "message"=>"Invalid User"]);exit();
}
?>