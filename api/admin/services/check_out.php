<?php
include '../../config.php';

try {
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $pay = $_POST['pay'];

    $stmt = "UPDATE tbservices SET check_out_date = now(), stt=2 WHERE id = '$id'";

    if ($result = $conn->query($stmt)) {
        $sql = "INSERT INTO payments SET amount = '$amount', pay='$pay', service_id='$id'";
        if ($conn->query($sql)) {

            $update = "UPDATE rooms SET room_status=1";
            $conn->query($update);
            echo json_encode(array([
                'statusCode' => 200,
                'message' => 'ສຳເລັດ',
            ]));
        }
    }
} catch (\Exception $e) {
    echo json_encode(array([
        'statusCode' => $e->getCode(),
        'message' => $e->getMessage()
    ]));
}
