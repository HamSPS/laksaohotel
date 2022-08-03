<?php
include '../../config.php';

$stmt = "SELECT *, MONTH(created_ad) AS month FROM tbcustomers ORDER BY id DESC";
$result = $conn->query($stmt);

if ($result->num_rows > 0) {
    $item = array();

    $month = date('m');
    foreach ($result as $key => $row) {

        if($row['month'] == $month){
            $row['month'] = date('d/m/Y', strtotime($row['created_ad'])) . ' <span class="badge badge-success">ລູກຄ້າໃໝ່</span>';
        }else{
            $row['month'] = date('d/m/Y', strtotime($row['created_ad']));
        }
        $item[] = [
            'key' => $key + 1,
            'id' => $row['id'],
            'cus_code' => $row['cus_code'],
            'cus_name' => $row['cus_name'],
            'cus_gender' => $row['cus_gender'],
            'cus_tel' => $row['cus_tel'],
            'cus_address' => $row['cus_address'],
            'card_no' => $row['cardId_or_passport'],
            'created' => $row['month'],
        ];
    }

    print json_encode($item, JSON_UNESCAPED_UNICODE);
}
