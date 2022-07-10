<?php
include '../config.php';

try {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tbemployees SET emp_code='$code', emp_name='$name',emp_gender='$gender',emp_dob='$dob',emp_address='$address',emp_tel='$tel',username='$username',emp_pwd=md5('$password')";

    if ($result = $conn->query($sql)) {
        echo json_encode(array("statusCode" => 200, "message" => "ເພີ່ມຂໍ້ມູນສຳເລັດ"));
    } else {
        echo json_encode(array("statusCode" => 201));
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