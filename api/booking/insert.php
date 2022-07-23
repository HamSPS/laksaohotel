<?php
session_start();
include '../config.php';

try {

    $customer = $_POST['customer'];
    $room = $_POST['room'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    //Check date
    $stmt = "SELECT * FROM booking WHERE room_id = '$room' AND (start_date >= '$startDate' AND end_date <= '$endDate')";
    $check = $conn->query($stmt);

    if ($check->num_rows > 0){
        echo json_encode(array("statusCode" => 200, "message" => "ຫ້ອງພັກນີ້ເຄີຍຖືກຈອງແລ້ວໃນວັນ $startDate ຫາ $endDate ກະລຸນາລອງໃໝ່"), JSON_UNESCAPED_UNICODE);
    }else{

        $sql = "INSERT INTO booking SET customer_id='$customer', room_id='$room',start_date='$startDate', end_date='$endDate',employee_id='$_SESSION[user]'";
    
        if ($result = $conn->query($sql)) {
            echo json_encode(array("statusCode" => 200, "message" => "ເພີ່ມຂໍ້ມູນສຳເລັດ"), JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(array("statusCode" => 202, "message" => "ເກີດຂໍ້ຜິດພາດ"), JSON_UNESCAPED_UNICODE);
        }
    }

} catch (\Exception $e) {

    $status = $e->getCode();

    if($e->getCode() == 1062){
        echo json_encode(array(["statusCode" => "$status", "message"=>"ຂໍ້ມູນລະຫັດ ຫຼື ຊື່ຜູ້ໃຊ້ມີການຊ້ຳກັນ ກະລຸນາລອງໃໝ່"]), JSON_UNESCAPED_UNICODE);
    }else{

        $res = array([
            "statusCode" => 201,
            "message" => "ເກີດຂໍ້ມູນຜິດພາດກະລຸນາລອງໃໝ່",
        ]);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}