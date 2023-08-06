<?php
include_once "_db.php";
function _sessionid($email){
   $sessionid = password_hash($email, PASSWORD_DEFAULT);
   return $sessionid;
}
function session_verification($_sessionid){
    global $conn;
    // echo $_sessionid;
    $sql = mysqli_query($conn, "SELECT * FROM sessions WHERE sessionid = '{$_sessionid}'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $_sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$row['email']}'");
         
        if(mysqli_num_rows($_sql) > 0){
            $_row = mysqli_fetch_assoc($_sql);
            return ['result'=>'success', "data"=>$_row];
        }
    }else{
        return json_encode(["result"=>"error", "message"=>"invalid sessionid"]);
    }
}

?>