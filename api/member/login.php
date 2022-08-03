<?php
session_start();

include '../config.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = "SELECT * FROM tbcustomers WHERE username = '$username' AND pwd = md5('$password')";

    $result = $conn->query($stmt);

    if ($result->num_rows > 0) {
        // foreach($result as $row){
        //     $_SESSION['user'] = $row['id'];
        //     $_SESSION['fullname'] = $row['emp_name'];
        // }

        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user['id'];
        $_SESSION['fullname'] = $user['cus_name'];
        $_SESSION['role'] = "member";

        echo "success";

    } else {
        echo "error";
    }

    $conn->close();
}