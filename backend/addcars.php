<?php
include_once "_db.php";
include_once "_common.php";
if(isset($_GET['vmodel']) && isset($_GET['vnumber']) && isset($_GET['scapacity']) && isset($_GET['rpday']) && isset($_GET['sessionid']))
{
    $_user_data = session_verification($_GET['sessionid']);
    // echo $_user_data;
    print_r($_user_data);
    if($_user_data['data']['agency'] != '1')
    {
        echo json_encode(['result'=>'error', 'message'=>'User is not an Agency']);exit();
    }
    $v_model = $_GET['vmodel'];
    $v_number = $_GET['vnumber'];
    $s_capacity = $_GET['scapacity'];
    $r_p_day = $_GET['rpday'];
    $session_id = $_GET['sessionid'];

    $insert_sql = "INSERT INTO `cars`(`vmodel`, `vnumber`, `scapacity`, `rpday`, `agencymail`) VALUES ('{$v_model}','{$v_number}','{$s_capacity}','{$r_p_day}','{$_user_data['data']['email']}')";
    if(mysqli_query($conn, $insert_sql)){
        echo json_encode(["result"=>"success", "message"=>"Car Added"]);exit();
    }else{
        echo json_encode(["result"=>"error", "message"=>"Contact admin"]);exit();
    }

    echo $_user_data;

}
?>