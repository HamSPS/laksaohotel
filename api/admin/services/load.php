<?php
include '../../config.php';

if (isset($_GET['customer'])) {
    $sql = 'SELECT * FROM tbcustomers';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $item = array();
        foreach ($result as $row) {
            $item[] = [
                'id' => $row['id'],
                'name' => $row['cus_name'],
            ];
        }
        echo json_encode($item, JSON_UNESCAPED_UNICODE);
    }
}

if (isset($_GET['type'])) {
    $sql = 'SELECT * FROM room_type';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $item = array();
        foreach ($result as $row) {
            $item[] = [
                'id' => $row['id'],
                'name' => $row['type_name'],
            ];
        }
        echo json_encode($item, JSON_UNESCAPED_UNICODE);
    }
}

if (isset($_GET['room']) && isset($_POST['id'])) {
    $sql =  "SELECT * FROM rooms r WHERE room_status = 1 AND type_id='$_POST[id]' AND NOT EXISTS(SELECT room_id FROM booking WHERE room_id=r.id AND book_status=1 AND start_date >= CURDATE());";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $item = array();
        foreach ($result as $row) {
            $item[] = [
                'id' => $row['id'],
                'name' => $row['room_no'],
            ];
        }
        echo json_encode($item, JSON_UNESCAPED_UNICODE);
    }
}

if (isset($_GET['booked']) && $_GET['roomId']) {
    $roomId = $_GET['roomId'];
    $sql =  "SELECT b.id,cus_name as title, start_date as `start`, end_date as `end` FROM `booking` b
LEFT JOIN tbcustomers c ON b.customer_id=c.id
WHERE room_id='$roomId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $item = array();
        foreach ($result as $row) {
            $item[] = $row;
        }
        echo json_encode($item, JSON_UNESCAPED_UNICODE);
    }else{
        echo 0;
    }
}

// $stmt = "SELECT r.id,room_no,type_id,room_status,book_status FROM rooms r
// LEFT JOIN booking b ON r.id=b.room_id";
// $result = $conn->query($stmt);

// if ($result->num_rows > 0) {
//     $item = array();

//     foreach ($result as $key => $row) {
//         $item[] = $row;
//     }

//     print json_encode($item, JSON_UNESCAPED_UNICODE);
// }
