<?php
include '../../config.php';

try {
    $id = $_POST['id'];

    $stmt = "SELECT s.id,check_in_date,stt,room_id,room_no,type_name,price,DATEDIFF(NOW(),check_in_date) AS total_date,customer_id,cus_code,cus_name
FROM tbservices s
LEFT JOIN tbcustomers c ON s.customer_id=c.id
LEFT JOIN rooms r ON s.room_id=r.id
LEFT JOIN room_type t ON r.type_id=t.id WHERE s.id='$id'";
    $result = $conn->query($stmt);

    if ($result->num_rows > 0) {
        $item = array();

        $today = date('Y-m-d');

        foreach ($result as $key => $row) {

            if($row['total_date'] == 0){
                $row['total_date'] = 1;
            }

            $item[] = [
                'id' => $row['id'],
                'check_in_date' => $row['check_in_date'],
                'room_id' => $row['room_id'],
                'room_no' => $row['room_no'],
                'type_name' => $row['type_name'],
                'price' => $row['price'],
                'total_date' => $row['total_date'],
                'amount' => $row['price'] * $row['total_date'],
                'cus_no' => $row['cus_code'],
                'cus_name' => $row['cus_name'],
            ];
        }

        print json_encode($item, JSON_UNESCAPED_UNICODE);
    }
} catch (\Exception $e) {
    echo json_encode(array(['statusCode' => $e->getCode(), 'message' => $e->getMessage()]));
}
