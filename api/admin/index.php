<?php
include '../config.php';

if (isset($_GET['booking'])) {
    $sql = "SELECT COUNT(*) AS count FROM booking WHERE MONTH(book_date)=MONTH(NOW()) AND YEAR(book_date) = YEAR(NOW()) AND book_status=1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $item = array();
        foreach ($result as $row) {
            $item[] = $row;
        }

        echo json_encode($item);
    }
}

if (isset($_GET['checkIn'])) {
    $sql = "SELECT COUNT(*) AS count FROM tbservices WHERE MONTH(sv_date)=MONTH(NOW()) AND YEAR(sv_date) = YEAR(NOW())";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $item = array();
        foreach ($result as $row) {
            $item[] = $row;
        }

        echo json_encode($item);
    }
}

if (isset($_GET['employee'])) {
    $sql = "SELECT COUNT(*) AS count FROM tbemployees";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $item = array();
        foreach ($result as $row) {
            $item[] = $row;
        }

        echo json_encode($item);
    }
}


if (isset($_GET['customer'])) {
    $sql = "SELECT COUNT(*) AS count FROM tbcustomers";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $item = array();
        foreach ($result as $row) {
            $item[] = $row;
        }

        echo json_encode($item);
    }
}

if (isset($_GET['chart']) && isset($_POST['year'])) {
    $sql = '';
   if($_POST['year'] == ''){
       $sql = "SELECT COUNT(*) AS amount, DATE_FORMAT(sv_date,'%M-%Y') AS checkInMonth FROM tbservices WHERE YEAR(sv_date) = Year(now()) GROUP BY MONTH(sv_date)";
   }else{
        $sql = "SELECT COUNT(*) AS amount, DATE_FORMAT(sv_date,'%M-%Y') AS checkInMonth FROM tbservices WHERE YEAR(sv_date) = '$_POST[year]' GROUP BY MONTH(sv_date)";

   }

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $item = array();
        foreach ($result as $row) {
            $item[] = $row;
        }

        echo json_encode($item);
    }else{
        echo json_encode(array(['amount' => 0, 'checkInMonth'=>'null']));
    }
}