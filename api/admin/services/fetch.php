<?php
include '../../config.php';

try {

    $where = '';
    if(isset($_GET['all'])){
        $where = '';
    }else{
        $where = 'WHERE s.stt=1';
    }

    $stmt = "SELECT s.id,sv_date,check_in_date,check_out_date,cus_name,emp_name,room_id,room_no,type_name,price,stt FROM tbservices s
    LEFT JOIN tbcustomers c ON s.customer_id=c.id
    LEFT JOIN tbemployees e ON s.employee_id=e.id
    LEFT JOIN rooms r ON s.room_id=r.id
    LEFT JOIN room_type t ON r.type_id=t.id
    $where
    ORDER BY stt ASC, id DESC";
    $result = $conn->query($stmt);

    if ($result->num_rows > 0) {
        $item = array();

        $today = date('Y-m-d');

        foreach ($result as $key => $row) {

            if ($row['stt'] == 1) {
                $status = '<span class="text-small badge badge-success">ກຳລັງເຂົ້າພັກ</span>';
                $button = '
                <a href="#" onclick="checkOut('.$row['id'].')" class="btn btn-success btn-sm rounded-circle btnUpdate" data-toggle="tooltip" data-placement="top" title="ແຈ້ງອອກ"><i class="fas fa-calendar-minus"></i></a>
                <a href="#" onclick="moveRoom('.$row['id'].')" class="btn btn-primary btn-sm rounded-circle btnUpdate" data-toggle="tooltip" data-placement="top" title="ຍ້າຍຫ້ອງພັກ"><i class="fas fa-pen"></i></a>
                ';
            } else{
                $status = '<span class="text-small badge badge-warning">ແຈ້ງອອກແລ້ວ</span>';
                // $button = '<a href="bill?print='.$row['id'].'" target="_blank" class="btn btn-primary btn-sm rounded-circle btnUpdate" data-toggle="tooltip" data-placement="top" title="ພິມບິນ"><i class="fas fa-print"></i></a>';
                $button = '<a href="#" onclick="printBill('. $row['id'] .')" class="btn btn-primary btn-sm rounded-circle btnUpdate" data-toggle="tooltip" data-placement="top" title="ພິມບິນ"><i class="fas fa-print"></i></a>';
            }



            $item[] = [
                'key' => $key + 1,
                'id' => $row['id'],
                'check_in_date' => $row['check_in_date'],
                'check_out_date' => $row['check_out_date'],
                'room_id' => $row['room_id'],
                'room_no' => $row['room_no'],
                'type_name' => $row['type_name'],
                'cus_name' => $row['cus_name'],
                'stt' => $row['stt'],
                'status' => $status,
                'operate' => $button,
            ];
        }

        print json_encode($item, JSON_UNESCAPED_UNICODE);
    }
} catch (\Exception $e) {
    echo json_encode(array(['statusCode' => $e->getCode(), 'message' => $e->getMessage()]));
}
