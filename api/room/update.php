<?php
include '../config.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == "check") {
        $id = $_POST['id'];

        $sql = "SELECT * FROM rooms WHERE id='$id'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $item = array();
            foreach ($result as $row) {
                $item[] = [
                    'id' => $row['id'],
                    'room_no' => $row['room_no'],
                    'type_id' => $row['type_id'],
                ];
            }

            echo json_encode($item);
        }
    } else {
        try {
            $id = $_POST['id'];
            $room_no = $_POST['room_no'];
            $type_id = $_POST['type_id'];

            $sql = "UPDATE rooms SET `room_no`='$room_no', type_id='$type_id' WHERE id='$id'";

            if ($result = $conn->query($sql)) {
                echo json_encode(array("statusCode" => 200, "message" => "ແກ້ໄຂຂໍ້ມູນສຳເລັດ"));
            } else {
                echo json_encode(array("statusCode" => 201));
            }
        } catch (\Exception $e) {
            $status = $e->getCode();

            if ($e->getCode() == 1062) {
                echo json_encode(array(["statusCode" => "$status", "message" => "ຂໍ້ມູນລະຫັດ ຫຼື ຊື່ຜູ້ໃຊ້ມີການຊ້ຳກັນ ກະລຸນາລອງໃໝ່"]));
            } else {

                $res = array([
                        "statusCode" => 201,
                        "message" => "ເກີດຂໍ້ມູນຜິດພາດກະລຸນາລອງໃໝ່",
                    ]);
                echo json_encode($res);
            }
        }

    }
}