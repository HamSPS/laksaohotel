<?php
session_start();
include '../../config.php';

if (isset($_POST['id'])) {
    try {
        $id = $_POST['id'];
        $roomId = $_POST['roomId'];

        $sql = "UPDATE tbservices SET room_id='$roomId',employee_id='$_SESSION[user]' WHERE id='$id'";

        if ($result = $conn->query($sql)) {
            echo json_encode(array([
                'statusCode' => 200,
                'message' => 'ສຳເລັດ'
            ]));
        }else{
            echo json_encode(array([
                'statusCode' => 201,
                'message' => 'ເກີດຂໍ້ຜິດພາດ'
            ]));
        }
    } catch (\Exception $e) {
        echo json_encode(array([
            'statusCode' => $e->getCode(),
            'message' => $e->getMessage()
        ]));
    }
}
