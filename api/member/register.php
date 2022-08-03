<?php
session_start();
include '../config.php';

try {
    $code = uniqid();
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    $card_no = $_POST['card_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tbcustomers SET cus_code='$code', cus_name='$name',cus_gender='$gender', cus_address='$address',cus_tel='$tel',cardId_or_passport='$card_no', username='$username', pwd=md5('$password')";

    if ($result = $conn->query($sql)) {
        echo json_encode(array("statusCode" => 200, "message" => "ສະໝັກສະມາຊິກສຳເລັດ"));

        $getUser = "SELECT * FROM tbcustomers WHERE username='$username' AND pwd=md5('$password')";
        $get = $conn->query($getUser);

        if($get->num_rows > 0){
            $user = $get->fetch_assoc();
            
            $_SESSION['user'] = $user['id'];
            $_SESSION['fullname'] = $user['cus_name'];
            $_SESSION['role'] = "member";
        }

    } else {
        echo json_encode(array("statusCode" => 201, "message" => "ເກີດຂໍ້ຜິດພາດ"));
    }
} catch (\Exception $e) {

    $status = $e->getCode();

    if($e->getCode() == 1062){
        echo json_encode(array(["statusCode" => "$status", "message"=>"ຂໍ້ມູນລະຫັດ ຫຼື ຊື່ຜູ້ໃຊ້ມີການຊ້ຳກັນ ກະລຸນາລອງໃໝ່"]));
    }else{

        $res = array([
            "statusCode" => 201,
            "message" => "ເກີດຂໍ້ມູນຜິດພາດກະລຸນາລອງໃໝ່",
        ]);
        echo json_encode($res);
    }
}