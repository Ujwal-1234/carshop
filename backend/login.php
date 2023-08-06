<?php
    
    include_once "_db.php";
    include_once "_common.php";
    if(isset($_GET['email']) && isset($_GET['pass'])){
        $email = $_GET['email'];
        $password = $_GET['pass'];
        if(empty($email) || empty($password)){
            echo json_encode(["result"=>"error", "message"=>"All input field are required", "data"=>$email.$password]);exit();            
        }else{
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                $_verify_pass = password_verify($password, $row['pass']);
                if($_verify_pass){
                    $_sessionid = _sessionid($email);
                    $insert_sql = "INSERT INTO sessions (sessionid, email) VALUES('{$_sessionid}','{$email}')";
                    if(mysqli_query($conn, $insert_sql)){
                        echo json_encode(["result"=>"success", "message"=>"logged in", "session_id"=>$_sessionid, "user_type"=>$row['agency']]);exit();
                    }else{
                        echo json_encode(["result"=>"error", "message"=>"Contact admin"]);exit();
                    }
                }else{
                    echo json_encode(["result"=>"error", "message"=>"password not matched"]);exit();
                }
            }else{
                echo json_encode(["result"=>"error", "message"=>"Email or password is incorrect!"]);exit();
            }
        }
    }
    echo json_encode(["result"=>"error", "message"=>"NOT LOGGED IN"]);exit();
?>