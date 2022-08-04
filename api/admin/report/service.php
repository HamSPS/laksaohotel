<?php
include '../../config.php';

if(isset($_GET['show'])){
    try {
        $sql = "SELECT s.id,sv_date,check_in_date,check_out_date,stt,room_id,room_no,type_name,customer_id,cus_code,cus_name
        FROM tbservices s
        LEFT JOIN tbcustomers c ON s.customer_id=c.id
        LEFT JOIN rooms r ON s.room_id=r.id
        LEFT JOIN room_type t ON r.type_id=t.id ORDER BY s.id DESC";

        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $item = array();
            foreach($result as $key => $row){

                if($row['stt'] == 1){
                    $status = '<span class="badge badge-success">ເຂົ້າພັກ</span>';
                }else{
                    $status = '<span class="badge badge-warning">ແຈ້ງອອກ</span>';
                }
                $item[] = [
                    'key' => $key + 1,
                    'id' => $row['id'],
                    'sv_date' => $row['sv_date'],
                    'check_in_date' => $row['check_in_date'],
                    'check_out_date' => $row['check_out_date'],
                    'stt' => $row['stt'],
                    'room_id' => $row['room_id'],
                    'room_no' => $row['room_no'],
                    'type_name' => $row['type_name'],
                    'customer_id' => $row['customer_id'],
                    'cus_code' => $row['cus_code'],
                    'cus_name' => $row['cus_name'],
                    'status' => $status,
                ];
            }

            echo json_encode($item);
        }
    } catch (\Exception $e) {
        echo json_encode(array(['statusCode' => $e->getCode(), 'message' => $e->getMessage()]));
    }
}

if(isset($_GET['chart'])){
    $sql = '';
    if($_POST['year'] == ''){
        $sql = "SELECT COUNT(*) AS amount, SUM(case WHEN stt = '1' then 1 else 0 end) AS checkIn, SUM(case WHEN stt = '2' then 1 else 0 end) AS checkOut, DATE_FORMAT(sv_date,'%M-%Y') AS checkInMonth FROM tbservices WHERE YEAR(sv_date) = Year(now()) GROUP BY MONTH(sv_date)";
    }else{
         $sql = "SELECT COUNT(*) AS amount, SUM(case WHEN stt = '1' then 1 else 0 end) AS checkIn, SUM(case WHEN stt = '2' then 1 else 0 end) AS checkOut, DATE_FORMAT(sv_date,'%M-%Y') AS checkInMonth FROM tbservices WHERE YEAR(sv_date) = $_POST[year] GROUP BY MONTH(sv_date)";
 
    }
 
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
         $item = array();
         foreach ($result as $row) {
             $item[] = $row;
         }
 
         echo json_encode($item);
     }else{
         echo json_encode(array(['amount' => 0,'checkIn' => 0,'checkOut' => 0, 'checkInMonth'=>'null']));
     }
}
