<?php
include '../config.php';

$stmt = "SELECT * FROM room_type ORDER BY id DESC";
$result = $conn->query($stmt);

if ($result->num_rows > 0) {
    $item = array();

    foreach ($result as $key => $row) {

        $price = "LAK " . number_format($row['price'], 2);
        $item[] = [
            'key' => $key + 1,
            'id' => $row['id'],
            'type_name' => $row['type_name'],
            'price' => $price,
        ];
    }

    print json_encode($item, JSON_UNESCAPED_UNICODE);
}