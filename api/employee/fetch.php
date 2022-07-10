<?php
include '../config.php';

$stmt = "SELECT * FROM tbemployees ORDER BY id DESC";
$result = $conn->query($stmt);

if ($result->num_rows > 0) {
    $item = array();

    foreach ($result as $key => $row) {
        $item[] = [
            'key' => $key + 1,
            'id' => $row['id'],
            'emp_code' => $row['emp_code'],
            'emp_name' => $row['emp_name'],
            'emp_gender' => $row['emp_gender'],
            'emp_dob' => $row['emp_dob'],
            'emp_address' => $row['emp_address'],
            'emp_tel' => $row['emp_tel'],
            'username' => $row['username'],
        ];
    }

    print json_encode($item, JSON_UNESCAPED_UNICODE);
}