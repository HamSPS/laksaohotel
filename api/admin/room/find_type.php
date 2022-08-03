<?php
include '../../config.php';

$stmt = "SELECT * FROM room_type";
$result = $conn->query($stmt);

if ($result->num_rows > 0) {
    $item = array();

    foreach ($result as $row) {
        $item[] = [
            'id' => $row['id'],
            'name' => $row['type_name'],
        ];
    }

    print json_encode($item, JSON_UNESCAPED_UNICODE);
}