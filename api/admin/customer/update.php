<?php
include '../../config.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == "check") {
        $id = $_POST['id'];

        $sql = "SELECT * FROM tbcustomers WHERE id='$id'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $item = array();
            foreach ($result as $row) {
                $item[] = [
                    'id' => $row['id'],
                    'code' => $row['cus_code'],
                    'name' => $row['cus_name'],
                    'gender' => $row['cus_gender'],
                    'address' => $row['cus_address'],
                    'tel' => $row['cus_tel'],
                    'card_no' => $row['cardId_or_passport'],
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
            $tel = $_POST['tel'];
            $address = $_POST['address'];
            $card_no = $_POST['card_no'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            if($password != null || $password != ''){
                $password = ", pwd = md5('$password')";
            }else{
                $password = '';
            }

            $sql = "UPDATE tbcustomers SET cus_code='$code', cus_name='$name',cus_gender='$gender', cus_address='$address',cus_tel='$tel',cardId_or_passport='$card_no',username='$username' $password WHERE id='$id'";

            if ($result = $conn->query($sql)) {
                echo json_encode(array("statusCode" => 200, "message" => "ແກ້ໄຂຂໍ້ມູນສຳເລັດ"));
            } else {
                echo json_encode(array("statusCode" => 201));
            }
        } catch (\Exception $e) {
            $status = $e->getCode();

            if ($e->getCode() == 1062) {
                echo json_encode(array(["statusCode" => "$status", "message" => "ຂໍ້ມູນການຊ້ຳກັນ ກະລຸນາລອງໃໝ່"]));
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