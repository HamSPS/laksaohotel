<?php
session_start();
include '../../config.php';

try {

    $book_id = $_POST['id'];

        $checkBook = "SELECT * FROM  booking WHERE id='$book_id'";
        $book = $conn->query($checkBook);

        if($book->num_rows > 0){
            $row = $book->fetch_assoc();
            $sql = "INSERT INTO tbservices SET customer_id='$row[customer_id]',room_id='$row[room_id]',employee_id='$_SESSION[user]', check_in_date=now()";

            if ($result = $conn->query($sql)) {
    
                $update = "UPDATE booking SET book_status = 2 WHERE id='$book_id'";
                $conn->query($update);

                $updateRoom = "UPDATE rooms SET room_status=2 WHERE id='$row[room_id]'";
                $conn->query($updateRoom);
                
                echo json_encode(array("statusCode" => 200, "message" => "ເພີ່ມຂໍ້ມູນສຳເລັດ"), JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(array("statusCode" => 202, "message" => "ເກີດຂໍ້ຜິດພາດ"), JSON_UNESCAPED_UNICODE);
            }
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
