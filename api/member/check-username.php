<?php

include '../config.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $stmt = "SELECT * FROM tbcustomers WHERE username = '$username'";

    $result = $conn->query($stmt);

    if ($result->num_rows > 0) {
        $item = array([
            'statusCode' => 201,
            'message' => 'ຊື່ຜູ້ໃຊ້ນີ້ມີແລ້ວກະລຸນາລອງໃໝ່',
        ]);
        echo json_encode($item);

    } else {
        $item = array([
            'statusCode' => 200,
            'message' => 'ຊື່ຜູ້ໃຊ້ນີ້ສາມາດນຳໃຊ້ໄດ້',
        ]);
        echo json_encode($item);
    }

    $conn->close();
}