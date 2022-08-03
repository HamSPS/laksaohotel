<?php
include '../../config.php';

if(isset($_GET['show'])){
    $stmt = "SELECT b.id, book_date,start_date,end_date, DATEDIFF(end_date,start_date) as total_date,room_id,room_no,type_id,type_name,price,DATEDIFF(end_date,start_date) * price AS total_price,employee_id,emp_code,emp_name,customer_id,cus_code,cus_name, book_status FROM `booking` b
LEFT JOIN rooms r ON b.room_id=r.id
LEFT JOIN tbemployees e ON b.employee_id=e.id
LEFT JOIN tbcustomers c ON b.customer_id=c.id
LEFT JOIN room_type rt ON r.type_id=rt.id
ORDER BY id DESC";
$result = $conn->query($stmt);

if ($result->num_rows > 0) {
    $item = array();

    $today = date('Y-m-d');

    foreach ($result as $key => $row) {

        $status = '';
        if($row['book_status'] == 1){
            $status = '<span class="badge badge-success">ກຳລັງຈອງ</span>';
        }elseif($row['book_status'] == 2){
            $status = '<span class="badge badge-primary">ເຂົ້າພັກແລ້ວ</span>';
        }else{
            $status = '<span class="badge badge-danger">ຍົກເລີກການຈອງ</span>';
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
            'status' => $status,
        ];
    }

    print json_encode($item, JSON_UNESCAPED_UNICODE);
}
}

if(isset($_GET['chart'])){
    $sql = '';
    if($_POST['year'] == ''){
        $sql = "SELECT COUNT(book_status) AS amount, SUM(case WHEN book_status = '1' then 1 else 0 end) AS book, SUM(case WHEN book_status = '2' then 1 else 0 end) AS checkIn, SUM(case WHEN book_status = '4' then 1 else 0 end) AS cancel, DATE_FORMAT(book_date,'%M-%Y') AS checkInMonth FROM booking WHERE YEAR(book_date) = Year(now()) GROUP BY MONTH(book_date)";
    }else{
         $sql = "SELECT COUNT(book_status) AS amount, SUM(case WHEN book_status = '1' then 1 else 0 end) AS book, SUM(case WHEN book_status = '2' then 1 else 0 end) AS checkIn, SUM(case WHEN book_status = '4' then 1 else 0 end) AS cancel, DATE_FORMAT(book_date,'%M-%Y') AS checkInMonth FROM booking WHERE YEAR(book_date) = $_POST[year] GROUP BY MONTH(book_date)";
 
    }
 
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
         $item = array();
         foreach ($result as $row) {
             $item[] = $row;
         }
 
         echo json_encode($item);
     }else{
         echo json_encode(array(['amount' => 0,'book' => 0,'checkIn' => 0,'cancel' => 0, 'checkInMonth'=>'null']));
     }
}