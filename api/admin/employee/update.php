<?php
include '../../config.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == "check") {
        $id = $_POST['id'];

        $sql = "SELECT * FROM tbemployees WHERE id='$id'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $item = array();
            foreach ($result as $row) {
                $item[] = [
                    'id' => $row['id'],
                    'code' => $row['emp_code'],
                    'name' => $row['emp_name'],
                    'gender' => $row['emp_gender'],
                    'dob' => $row['emp_dob'],
                    'address' => $row['emp_address'],
                    'tel' => $row['emp_tel'],
                    'username' => $row['username'],
                ];
            }

            echo json_encode($item);
        }
    } else {
        try {
            $id = $_POST['id'];
            $code = $_POST['code'];
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $tel = $_POST['tel'];
            $address = $_POST['address'];
            $username = $_POST['username'];

            $sql = "UPDATE tbemployees SET emp_code='$code', emp_name='$name',emp_gender='$gender',emp_dob='$dob',emp_address='$address',emp_tel='$tel',username='$username' WHERE id='$id'";

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