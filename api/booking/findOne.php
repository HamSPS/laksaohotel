<?php
include '../config.php';

if(isset($_POST['id']) != null){
    $id = $_POST['id'];

    $sql = "SELECT b.id, book_date,start_date,end_date, DATEDIFF(end_date,start_date) as total_date,room_id,room_no,type_id,type_name,price,DATEDIFF(end_date,start_date) * price AS total_price,employee_id,emp_code,emp_name,customer_id,cus_code,cus_name,cus_gender,cus_tel,cus_address,cardId_or_passport, book_status FROM `booking` b
LEFT JOIN rooms r ON b.room_id=r.id
LEFT JOIN tbemployees e ON b.employee_id=e.id
LEFT JOIN tbcustomers c ON b.customer_id=c.id
LEFT JOIN room_type rt ON r.type_id=rt.id
WHERE book_status = 1 AND b.id='$id'
ORDER BY id DESC";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        foreach($result as $row){
            $item[] = $row;
        }

        echo json_encode($item, JSON_UNESCAPED_UNICODE);
    }
}