<?php
include '../config.php';

if (isset($_POST['id'])){
    try {
        $id = $_POST['id'];

        $sql = "UPDATE booking SET book_status = 4 WHERE id='$id'";

        if ($result = $conn->query($sql)) {
            echo json_encode(array("statusCode" => 200), JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(array("statusCode" => 201), JSON_UNESCAPED_UNICODE);
        }
    } catch (\Exception $e) {
        $status = $e->getCode();

        $res = array([
            "statusCode" => $status,
            "message" => "ເກີດຂໍ້ມູນຜິດພາດກະລຸນາລອງໃໝ່",
            "error" => $e->getMessage()
        ]);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}
