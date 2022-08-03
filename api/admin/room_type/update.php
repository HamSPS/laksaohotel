<?php
include '../../config.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == "check") {
        $id = $_POST['id'];

        $sql = "SELECT * FROM room_type WHERE id='$id'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $item = array();
            foreach ($result as $row) {
                $item[] = [
                    'id' => $row['id'],
                    'type_name' => $row['type_name'],
                    'price' => $row['price'],
                ];
            }

            echo json_encode($item);
        }
    } else {
        try {
            $id = $_POST['id'];
            $type_name = $_POST['type_name'];
            $price = $_POST['price'];

            $sql = "UPDATE room_type SET `type_name`='$type_name', price='$price' WHERE id='$id'";

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