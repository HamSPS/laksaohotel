<?php
    session_start();
    include '../config.php';

    try {
        $customer = $_SESSION['user'];
        $sql = "SELECT b.id,book_date,start_date,end_date,room_no,type_name,price,book_status FROM booking b
        LEFT JOIN rooms r ON b.room_id=r.id
        LEFT JOIN room_type t ON r.type_id=t.id
        WHERE customer_id='$customer' ORDER BY id DESC";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $item = array();
            foreach($result as $key => $row){
                if($row['book_status'] == 1){
                    $status = '<span class="badge badge-primary">ລໍຖ້າເຂົ້າພັກ</span>';
                }elseif($row['book_status'] == 2){
                    $status = '<span class="badge badge-success">ແຈ້ງເຂົ້າພັກແລ້ວ</span>';
                }else{
                    $status = '<span class="badge badge-danger">ຍົກເລີກ</span>';
                }

                $item[] = [
                    "key" => $key+1,
                    "id" => $row['id'],
                    "book_date" => $row['book_date'],
                    "start_date" => $row['start_date'],
                    "end_date" => $row['end_date'],
                    "room_no" => $row['room_no'],
                    "type_name" => $row['type_name'],
                    "price" => "LAK ". number_format($row['price'], 2),
                    "status" => $status
                ];
            }

            echo json_encode($item);
        }
    } catch (\Exception $e) {
        echo json_encode(array([
            "statusCode" => $e->getCode(),
            "message" => $e->getMessage()
        ]));
    }
