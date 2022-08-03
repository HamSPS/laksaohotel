<?php
include '../../config.php';

$stmt = "SELECT b.id, book_date,start_date,end_date, DATEDIFF(end_date,start_date) as total_date,room_id,room_no,type_id,type_name,price,DATEDIFF(end_date,start_date) * price AS total_price,employee_id,emp_code,emp_name,customer_id,cus_code,cus_name, book_status FROM `booking` b
LEFT JOIN rooms r ON b.room_id=r.id
LEFT JOIN tbemployees e ON b.employee_id=e.id
LEFT JOIN tbcustomers c ON b.customer_id=c.id
LEFT JOIN room_type rt ON r.type_id=rt.id
WHERE book_status = 1
ORDER BY id DESC";
$result = $conn->query($stmt);

if ($result->num_rows > 0) {
    $item = array();

    $today = date('Y-m-d');

    foreach ($result as $key => $row) {

        if($today >= $row['start_date'] && $today <= $row['end_date']){
            $status = '<span class="text-small badge badge-info">ຮອດມື້ທີ່ຈອງແລ້ວ</span>';
        }elseif($today > $row['end_date']){
            $status = '<span class="text-small badge badge-danger">ໝົດກຳນົດຈອງ</span>';
        }else{
            $status = '<span class="text-small badge badge-success">ຢູ່ໃນການຈອງ</span>';
        }

        $item[] = [
            'key' => $key +1,
            'id' => $row['id'],
            'book_date' => $row['book_date'],
            'start_date' => $row['start_date'],
            'end_date' => $row['end_date'],
            'room_no' => $row['room_no'],
            'type_name'=> $row['type_name'],
            'cus_name'=> $row['cus_name'],
            'status' => $status
        ];
    }

    print json_encode($item, JSON_UNESCAPED_UNICODE);
}


// $item[] = [
//     'key' => $key + 1,
//     'id' => $row['id'],
//     'book_date' => $row['book_date'],
//     'start_date' => $row['start_date'],
//     'end_date' => $row['end_date'],
//     'total_date' => $row['total_date'],
//     'room' =>  array([
//         'id' => $row['room_id'],
//         'room_no' => $row['room_no'],
//         'type_id' => $row['type_id'],
//         'type_name' => $row['type_name'],
//         'price' => $row['price'],
//     ]),
//     'total_price' => $row['total_price'],
//     'employee' => array([
//         'id' => $row['employee_id'],
//         'emp_code' => $row['emp_code'],
//         'emp_name' => $row['emp_name'],
//     ]),
//     'customer' => array([
//         'customer_id' => $row['customer_id'],
//         'cus_code' => $row['cus_code'],
//         'cus_name' => $row['cus_name'],
//     ]),
// ];