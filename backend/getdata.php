<?php
include_once "_db.php";
    $sql = mysqli_query($conn, "SELECT * FROM cars");
    if(mysqli_num_rows($sql) > 0){

        
        $cars = array();
        for($i=0; $i<mysqli_num_rows($sql); $i++){
            $row = mysqli_fetch_assoc($sql);
            // print_r($row);
            array_push($cars, $row);
        }
        echo json_encode(["result"=>"success", "data"=>$cars]);exit();
    }
    echo json_encode(['result'=>'success', 'data'=>'no data']);exit();
?>