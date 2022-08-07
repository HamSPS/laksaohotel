<?php
include '../../config.php';

if (isset($_GET['date'])) {
    try {
        $sql = "SELECT p.id, DATE_FORMAT(pay_date,'%d/%m/%Y') AS payDate, SUM(amount) AS amount, SUM(pay) AS pay, SUM(DATEDIFF(check_out_date,check_in_date) + 1) AS totalDate FROM payments p
            LEFT JOIN tbservices s ON p.service_id=s.id
            GROUP BY DATE_FORMAT(pay_date,'%Y-%m-%d')";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $item = array();
            foreach ($result as $key => $row) {
                $item[] = [
                    'key' => $key + 1,
                    'id' => $row['id'],
                    'payDate' => $row['payDate'],
                    'amount' => "LAK " .  number_format($row['amount'], 2),
                    'pay' => "LAK " . number_format($row['pay'], 2),
                    'totalDate' => $row['totalDate']
                ];
            }

            echo json_encode($item);
        }
    } catch (\Exception $e) {
        echo json_encode(array(['statusCode' => $e->getCode(), 'message' => $e->getMessage()]));
    }
}

if (isset($_GET['month'])) {
    try {
        $sql = "SELECT p.id, DATE_FORMAT(pay_date,'%M-%Y') AS payDate,SUM(amount) AS amount, SUM(pay) AS pay, SUM(DATEDIFF(check_out_date,check_in_date) + 1) AS totalDate FROM payments p
            LEFT JOIN tbservices s ON p.service_id=s.id
            GROUP BY MONTH(pay_date)";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $item = array();
            foreach ($result as $key => $row) {
                $item[] = [
                    'key' => $key + 1,
                    'id' => $row['id'],
                    'payDate' => $row['payDate'],
                    'amount' => "LAK " .  number_format($row['amount'], 2),
                    'pay' => "LAK " . number_format($row['pay'], 2),
                    'totalDate' => $row['totalDate']
                ];
            }

            echo json_encode($item);
        }
    } catch (\Exception $e) {
        echo json_encode(array(['statusCode' => $e->getCode(), 'message' => $e->getMessage()]));
    }
}

if (isset($_GET['year'])) {
    try {
        $sql = "SELECT p.id, DATE_FORMAT(pay_date,'%Y') AS payDate,SUM(amount) AS amount, SUM(pay) AS pay, SUM(DATEDIFF(check_out_date,check_in_date) + 1) AS totalDate FROM payments p
            LEFT JOIN tbservices s ON p.service_id=s.id
            GROUP BY YEAR(pay_date)";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $item = array();
            foreach ($result as $key => $row) {
                $item[] = [
                    'key' => $key + 1,
                    'id' => $row['id'],
                    'payDate' => $row['payDate'],
                    'amount' => "LAK " .  number_format($row['amount'], 2),
                    'pay' => "LAK " . number_format($row['pay'], 2),
                    'totalDate' => $row['totalDate']
                ];
            }

            echo json_encode($item);
        }
    } catch (\Exception $e) {
        echo json_encode(array(['statusCode' => $e->getCode(), 'message' => $e->getMessage()]));
    }
}

if (isset($_GET['chart'])) {
    $sql = '';
    if ($_POST['year'] == '') {
        $sql = "SELECT SUM(amount) AS amount, DATE_FORMAT(pay_date,'%M-%Y') AS date FROM payments WHERE YEAR(pay_date)=YEAR(NOW()) GROUP BY MONTH(pay_date)";
    } else {
        $sql = "SELECT SUM(amount) AS amount, DATE_FORMAT(pay_date,'%M-%Y') AS date FROM payments WHERE YEAR(pay_date) = $_POST[year] GROUP BY MONTH(pay_date)";
    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $item = array();
        foreach ($result as $row) {
            $item[] = $row;
        }

        echo json_encode($item);
    } else {
        echo json_encode(array(['amount' => 0, 'checkIn' => 0, 'checkOut' => 0, 'checkInMonth' => 'null']));
    }
}
