<?php
include '../config.php';

try {
    $id = $_POST['id'];

    $sql = "DELETE FROM tbcustomers WHERE id='$id'";

    if ($result = $conn->query($sql)) {
        echo json_encode(array("statusCode" => 200));
    } else {
        echo json_encode(array("statusCode" => 201));
    }
} catch (\Exception $e) {
    $status = $e->getCode();

    $res = array([
        "statusCode" => $status,
        "message" => "ເກີດຂໍ້ມູນຜິດພາດກະລຸນາລອງໃໝ່",
    ]);
    echo json_encode($res);
}
