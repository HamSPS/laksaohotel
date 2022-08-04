<?php
$path = '../../../';
include $path . 'api/config.php';

if (isset($_GET['print'])) {
    $id = $_GET['print'];
    $sql = "SELECT s.id,sv_date,check_in_date,check_out_date,room_no,type_name,price,amount,pay,cus_code,cus_name,emp_code,emp_name,DATEDIFF(check_out_date,check_in_date) as total_date FROM tbservices s
LEFT JOIN payments p ON p.service_id=s.id
LEFT JOIN tbcustomers c ON s.customer_id=c.id
LEFT JOIN tbemployees e ON s.employee_id=e.id
LEFT JOIN rooms r ON s.room_id=r.id
LEFT JOIN room_type t ON r.type_id=t.id
WHERE stt=2 AND s.id='$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $fetch = $result->fetch_assoc();

        $serviceId = $fetch['id'];
        $date = $fetch['sv_date'];
        $checkIn = $fetch['check_in_date'];
        $checkOut = $fetch['check_out_date'];
        $room = $fetch['room_no'];
        $type = $fetch['type_name'];
        $price = $fetch['price'];
        $amount = $fetch['amount'];
        $pay = $fetch['pay'];
        $cusCode = $fetch['cus_code'];
        $cusName = $fetch['cus_name'];
        $empCode = $fetch['emp_code'];
        $empName = $fetch['emp_name'];
        $totalDate = $fetch['total_date'];

        if ($totalDate == 0) {
            $totalDate = 1;
        }

        if (strlen($id) == 1) {
            $serviceId = "000000" . $id;
        } elseif (strlen($id) == 2) {
            $serviceId = "00000" . $id;
        } elseif (strlen($id) == 3) {
            $serviceId = "0000" . $id;
        } elseif (strlen($id) == 4) {
            $serviceId = "000" . $id;
        } elseif (strlen($id) == 5) {
            $serviceId = "00" . $id;
        } elseif (strlen($id) == 6) {
            $serviceId = "0" . $id;
        } else {
            $serviceId = $id;
        }
    } else {
        echo '<script>window.close()</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100;200;300;400;500;600;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/plugins/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            display: none;
        }

        .header {
            display: flex;
            justify-content: space-between;
        }

        .description .bill-info,
        .detail .desc {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }



        .description .bill-info p:nth-child(odd),
        .detail .desc p:nth-child(odd) {
            font-weight: 600;
        }

        .description .bill-info p:nth-child(even),
        .description h1,
        .detail .desc p:nth-child(even) {
            text-align: right;
        }

        .detail .desc {
            width: 400px;
        }

        @media print {
            body {
                display: block;
                font-family: 'Noto Sans Lao', sans-serif;

            }
        }
    </style>
</head>

<body class="container-fluid" onload="window.print()">
    <div class="header">
        <div class="logo">
            <figure>
                <img src="<?= $path ?>/assets/dist/img/AdminLTELogo.png" alt="">
                <h3>ສະບາຍດີຫຼັກ 20</h3>
            </figure>
        </div>
        <div class="description">
            <h1>ໃບບິນ</h1>
            <div class="bill-info">
                <p>ວັນທີ</p>
                <p><?= $date ?></p>
                <p>ເລກບິນ</p>
                <p><?= $serviceId ?></p>
                <p>ລະຫັດພະນັກງານ</p>
                <p><?= $empCode ?> | <?= $empName ?></p>
            </div>
        </div>
    </div>
    <hr>
    <div class="detail mt-4">
        <div class="desc">
            <p>ລະຫັດລູກຄ້າ</p>
            <p><?= $cusCode ?></p>
            <p>ຊື່ ແລະ ນາມສະກຸນ</p>
            <p><?= $cusName ?></p>
        </div>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>ເບີຫ້ອງ</th>
                    <th>ປະເພດ</th>
                    <th>ລາຄາ</th>
                    <th>ວັນເຂົ້າພັກ</th>
                    <th>ວັນແຈ້ງອອກ</th>
                    <th>ຈຳນວນວັນ</th>
                    <th>ລາຄາລວມ</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <th><?= $room ?></th>
                    <td><?= $type ?></td>
                    <td class="text-right">LAK <?= number_format($price, 2) ?></td>
                    <td><?= $checkIn ?></td>
                    <td><?= $checkOut ?></td>
                    <td><?= $totalDate ?></td>
                    <td class="text-right">LAK <?= number_format($amount, 2) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <h4 class="text-center mt-5">ຂໍຂອບໃຈ</h4>

    <script>
        window.onfocus = () => {
            setTimeout(() => {
                window.close();
            }, 500);
        };
    </script>

</body>

</html>