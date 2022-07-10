<?php
include '../config.php';

$stmt = "SELECT * FROM tbcustomers ORDER BY id DESC";
$result = $conn->query($stmt);

if ($result->num_rows > 0) {
    $item = array();

    foreach ($result as $key => $row) {
        $item[] = [
            'key' => $key + 1,
            'id' => $row['id'],
            'cus_code' => $row['cus_code'],
            'cus_name' => $row['cus_name'],
            'cus_gender' => $row['cus_gender'],
            'cus_tel' => $row['cus_tel'],
            'cus_address' => $row['cus_address'],
            'card_no' => $row['cardId_or_passport'],
        ];
    }

    print json_encode($item, JSON_UNESCAPED_UNICODE);
}
