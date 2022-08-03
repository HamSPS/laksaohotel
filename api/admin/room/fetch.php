<?php
include '../../config.php';

$stmt = "SELECT r.id,room_no,type_id,type_name,price,room_status,r.created_at FROM rooms r LEFT JOIN room_type t ON r.type_id=t.id ORDER BY r.id DESC";
$result = $conn->query($stmt);

if ($result->num_rows > 0) {
    $item = array();

    foreach ($result as $key => $row) {
        $status = '';
        $price = "LAK " . number_format($row['price'], 2);
        if ($row['room_status'] = 1) {
            $status = '<span class="text-sm badge badge-success">ຫວ່າງ</span>';
        }else{
            $status = '<span class="text-sm badge badge-danger">ບໍ່ຫວ່າງ</span>';
        }
        $item[] = [
            'key' => $key + 1,
            'id' => $row['id'],
            'room_no' => $row['room_no'],
            'type_id' => $row['type_id'],
            'type_name' => $row['type_name'],
            'room_status' => $status,
            'price' => $price,
        ];
    }

    print json_encode($item, JSON_UNESCAPED_UNICODE);
}