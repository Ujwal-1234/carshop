<?php
require_once "_db.php";

if(isset($_GET['email']) && isset($_GET['pass']) && isset($_GET['cpass']) && isset($_GET['phone']) && isset($_GET['type']))
{
    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $password = mysqli_real_escape_string($conn, $_GET['pass']);
    $c_password = mysqli_real_escape_string($conn, $_GET['cpass']);
    $username = mysqli_real_escape_string($conn, $_GET['username']);
    $user_type = mysqli_real_escape_string($conn, $_GET['type']);
    $contact = mysqli_real_escape_string($conn, $_GET['phone']);   
    if(empty($email) || empty($password) || empty($c_password) || empty($user_type)){
        echo json_encode(["result"=>"error", "message"=>"empty fields"+$email+$password+$c_password+$user_type]);
        exit();
    }
    $check_data = "SELECT * FROM users WHERE email='{$email}'";
    $result = mysqli_query($conn, $check_data);
    if(mysqli_num_rows($result)>0){
        echo json_encode(["result"=>"error", "message"=>"You already have account"]);
        exit();
    }
    if($password!=$c_password){
        echo json_encode(["result"=>"error", "message"=>"Password didnot matched"]);exit();
    }
    $hashpass = password_hash($password, PASSWORD_DEFAULT);
    switch($user_type){
        case 'C':
                $insert_sql = "INSERT INTO users (username, email, pass, phone, agency) VALUES('{$username}','{$email}', '{$hashpass}', '{$contact}', 0)";
                break;
        case 'A': 
                $insert_sql = "INSERT INTO users (username, email, phone, pass, agency, gstno) VALUES('{$username}','{$email}', '{$contact}', '{$hashpass}', 1, '{$_GET['gstno']}')";
                break;
        default :
                echo json_encode(["result"=>"error", "message"=>"Invalid user type.! Please contact admin"]);
                exit();
    }
    if(mysqli_query($conn, $insert_sql)){
        echo json_encode(["result"=>"success", "message"=>"Successfully created"]);
        exit();
    }else{
        echo json_encode(["result"=>"error", "message"=>"Failed to create. !Please contact admin"]);
        exit();
    }
}
echo json_encode(["result"=>"error", "message"=>"Empty Fields"]);
exit();
?>