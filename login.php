<?php
require_once "../conn.php";
//
// // getting data from the form
$Email = trim($_REQUEST['Email']);
$Password = trim($_REQUEST['Password']);

//checking if the user exist
$database = new Database();
echo $query = "SELECT * FROM Online_payers WHERE
    Email = :Email
    AND BINARY Password = :Password
;";
$database->query($query);
$database->bind(':Email', $Email);
$database->bind(':Password', $Password);
echo $rowCount = $database->rowCount();
$rows_Online_payers = $database->resultset();
if ($rowCount > 0) {
    header("location:invoices.php");
    foreach ($rows_Online_payers as $row_Online_payers) {
        //setting up the session
        $_SESSION['Online_payers_Email'] = $row_Online_payers->Email;
    }
}
else {
        header("location:index.php");
    }
?>
