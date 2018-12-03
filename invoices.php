<?php
require_once "functions.php";
//checking if the user is logged in
check_login();

//getting data from the talbe Online_payers
$Online_payers_Email = $_SESSION['Online_payers_Email'];

$rows_Online_payers = table_Online_payers('select-all', $Online_payers_Email, NULL);
foreach ($rows_Online_payers as $row_Online_payers) {
    // code...
}

$rows_sum = table_Online_payers('sum', $Online_payers_Email, NULL);
foreach ($rows_sum as $row_sum) {
    // code...
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // getting the data from the form to be sent to the payment gateway server
    $BookingName = $_REQUEST['BookingName'];
    $BookingReference = $_REQUEST['BookingReference'];
    $TransactionAmount = $_REQUEST['Total'] * 100;
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php
    $page_title = 'Invoices';
    include "includes/head.html";
    ?>
    <body>
        <!-- content -->
        <div class="content">
            <header>
                <img src="images/Link_logo.jpg" alt="Link Logo">
                <h2>
                    Pending Invoices
                </h2>
            </header>
            <?php include "includes/nav.html"; ?>
            <main>
                <form class="payment" action="#" method="post">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">
                                    Booking Name:
                                    <input type="text" name="BookingName" value="<?php echo $row_Online_payers->Name; ?>">
                                </th>
                                <th colspan="2">
                                    Booking Reference:
                                    <input type="text" name="BookingReference" value="<?php echo $row_Online_payers->Reference; ?>">
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Invoice No
                                </th>
                                <th>
                                    Amount in USD
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($rows_Online_payers as $row_Online_payers) {
                                echo "<tr>";
                                echo "<td>".date("d-M-Y", strtotime($row_Online_payers->InvoiceDate))."</td>";
                                echo "<td>".$row_Online_payers->InvoiceNo."</td>";
                                echo "<td>".$row_Online_payers->USD."</td>";
                                echo "<td>".$row_Online_payers->Status."</td>";
                                echo "</tr>";
                            }
                            ?>
                            <tr>
                                <th colspan="2">Outstanding balance in USD:</th>
                                <th>
                                    <input type="number" name="Total" value="<?php echo $row_sum->Total; ?>" step="0.01" readonly>
                                </th>
                                <tr>
                                    <th colspan="4">
                                        <button type="submit" class="button submit" name="buttonSubmit">Pay Now</button>
                                    </th>
                                </tr>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </main>
            <?php include "includes/footer.html"; ?>
        </div>
        <!-- end of content -->
    </body>
</html>
