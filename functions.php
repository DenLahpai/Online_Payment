<?php
require_once "../conn.php";

//function to check if the user is logged in
function check_login() {
    if (!isset($_SESSION['Online_payers_Email'])) {
        header("location: index.php");
    }
}

//function to get data from the table Online_payers
function table_Online_payers($job, $a, $b) {
    $database = new Database();

    switch ($job) {
        //selecting one row from the table
        case 'sum':
        $query = "SELECT
            Invoices.InvoiceDate,
            SUM(Invoices.USD) AS Total,
            Invoices.USD,
            Invoices.Status,
            InvoiceHeader.Addressee,
            InvoiceHeader.Address,
            InvoiceHeader.City,
            InvoiceHeader.Attn,
            Bookings.Reference,
            Bookings.Name,
            Online_payers.InvoiceNo
            FROM Online_payers
            LEFT JOIN Invoices
            ON Online_payers.InvoiceNo = Invoices.InvoiceNo
            LEFT JOIN InvoiceHeader
            ON Online_payers.InvoiceNo = InvoiceHeader.InvoiceNo
            LEFT JOIN Bookings
            ON Bookings.Id = Invoices.BookingsId
            WHERE Online_payers.Email = :Email
            AND Invoices.Status != 'PAID'
        ;";
            $database->query($query);
            $database->bind(':Email', $a);
            return $r = $database->resultset();
            break;

        case 'select-all':
            $query = "SELECT
                Invoices.InvoiceDate,
                SUM(Invoices.USD) AS Total,
                Invoices.USD,
                Invoices.Status,
                InvoiceHeader.Addressee,
                InvoiceHeader.Address,
                InvoiceHeader.City,
                InvoiceHeader.Attn,
                Bookings.Reference,
                Bookings.Name,
                Online_payers.InvoiceNo
                FROM Online_payers
                LEFT JOIN Invoices
                ON Online_payers.InvoiceNo = Invoices.InvoiceNo
                LEFT JOIN InvoiceHeader
                ON Online_payers.InvoiceNo = InvoiceHeader.InvoiceNo
                LEFT JOIN Bookings
                ON Bookings.Id = Invoices.BookingsId
                WHERE Online_payers.Email = :Email
            ;";
            $database->query($query);
            $database->bind(':Email', $a);
            return $r = $database->resultset();
            break;

        case 'select-one':
            $query = "SELECT * FROM Online_payers WHERE Email = :Email ;";
            $database->query($query);
            $database->bind(':Email', $a);
            return $r = $database->resultset();
            break;

        case 'rowCount':
            $query = "SELECT * FROM Online_payers WHERE Email = :Email ;";
            $database->query($query);
            $database->bind(':Email', $a);
            return $r = $database->rowCount();
            break;

        default:
            // code...
            break;
    }
}

//function to get data from the table invoices
function table_Invoice($job, $a, $b) {
    $database = new Database();

    switch ($job) {
        case 'select-all':
            $query = "SELECT

            ;";
            break;

        default:
            // code...
            break;
    }
}

?>
