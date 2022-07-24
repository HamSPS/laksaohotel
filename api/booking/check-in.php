<?php
session_start();
include '../config.php';

try {

    $book_id = $_POST['id'];

        $sql = "INSERT INTO tbservices SET book_id='$book_id', check_in_date=now()";

        if ($result = $conn->query($sql)) {

            $update = "UPDATE booking SET book_status = 2 WHERE id='$book_id'";
            $conn->query($update);
            echo json_encode(array("statusCode" => 200, "message" => "ເພີ່ມຂໍ້ມູນສຳເລັດ"), JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(array("statusCode" => 202, "message" => "ເກີດຂໍ້ຜິດພາດ"), JSON_UNESCAPED_UNICODE);
        }
} catch (\Exception $e) {

    $status = $e->getCode();

    if ($e->getCode() == 1062) {
        echo json_encode(array(["statusCode" => "$status", "message" => "ຂໍ້ມູນລະຫັດ ຫຼື ຊື່ຜູ້ໃຊ້ມີການຊ້ຳກັນ ກະລຸນາລອງໃໝ່"]), JSON_UNESCAPED_UNICODE);
    } else {

        $res = array([
            "statusCode" => 201,
            "message" => "ເກີດຂໍ້ມູນຜິດພາດກະລຸນາລອງໃໝ່",
        ]);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}
