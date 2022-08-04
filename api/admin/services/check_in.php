<?php
    session_start();
    include '../../config.php';

    try {
        $customer = $_POST['customer'];
        $room = $_POST['room'];
        $user = $_SESSION['user'];
        

        $sql = "INSERT INTO tbservices SET check_in_date=CURDATE(),customer_id='$customer',room_id='$room', employee_id='$user', stt=1";

        if($result = $conn->query($sql)){
            $update = "UPDATE rooms SET room_status = 2 WHERE id='$room'";
            $conn->query($update);

            echo json_encode(array([
                'statusCode' => 200,
                'message' => 'ເພີ່ມຂໍ້ມູນສຳເລັດ'
            ])); 
        }
    } catch (\Exception $e) {
        echo json_encode(array([
            'statusCode' => $e->getCode(),
            'message' => $e->getMessage()
        ]));
    }
?>