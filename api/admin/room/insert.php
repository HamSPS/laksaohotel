<?php
include '../../config.php';

try {
    $room_no = $_POST['room_no'];
    $type_id = $_POST['type_id'];

    $sql = "INSERT INTO rooms SET `room_no`='$room_no', type_id='$type_id'";

    if ($result = $conn->query($sql)) {
        echo json_encode(array("statusCode" => 200, "message" => "ເພີ່ມຂໍ້ມູນສຳເລັດ"));
    } else {
        echo json_encode(array("statusCode" => 201));
    }
} catch (\Exception $e) {

    $status = $e->getCode();

    if($e->getCode() == 1062){
        echo json_encode(array(["statusCode" => "$status", "message"=>"ຂໍ້ມູນລະຫັດ ຫຼື ຊື່ຜູ້ໃຊ້ມີການຊ້ຳກັນ ກະລຸນາລອງໃໝ່"]));
    }else{

        $res = array([
            "statusCode" => 201,
            "message" => "ເກີດຂໍ້ມູນຜິດພາດກະລຸນາລອງໃໝ່",
        ]);
        echo json_encode($res);
    }
}