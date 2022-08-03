<?php
include '../../config.php';

try {
    $stmt = "SELECT s.id,check_in_date,stt,room_id,room_no,type_name,customer_id,cus_code,cus_name
FROM tbservices s
LEFT JOIN booking b ON s.book_id=b.id
LEFT JOIN tbcustomers c ON b.customer_id=c.id
LEFT JOIN rooms r ON b.room_id=r.id
LEFT JOIN room_type t ON r.type_id=t.id ORDER BY s.id DESC";
    $result = $conn->query($stmt);

    if ($result->num_rows > 0) {
        $item = array();

        $today = date('Y-m-d');

        foreach ($result as $key => $row) {

            if ($row['stt'] == 1) {
                $status = '<span class="text-small badge badge-success">ກຳລັງເຂົ້າພັກ</span>';
            } else{
                $status = '<span class="text-small badge badge-warning">ແຈ້ງອອກແລ້ວ</span>';
            }

            $item[] = [
                'key' => $key + 1,
                'id' => $row['id'],
                'check_in_date' => $row['check_in_date'],
                'room_id' => $row['room_id'],
                'room_no' => $row['room_no'],
                'type_name' => $row['type_name'],
                'cus_name' => $row['cus_name'],
                'stt' => $row['stt'],
                'status' => $status
            ];
        }

        print json_encode($item, JSON_UNESCAPED_UNICODE);
    }
} catch (\Exception $e) {
    echo json_encode(array(['statusCode' => $e->getCode(), 'message' => $e->getMessage()]));
}
