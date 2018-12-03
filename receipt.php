<?php
require_once "functions.php";
// require_once "result.php";
require_once "codes.php";
//function getValue
function getValue($key) {
    if (isset($_GET[$key]) && $_GET[$key]!=""){
        return $_GET[$key];
    }
    else{
        return "No value return";
    }
}

//setting up the time zone
date_default_timezone_set("Asia/Yangon");

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
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php
    $page_title = 'Transaction Result';
    include "includes/head.html";
    ?>
    <body>
        <!-- content -->
        <div class="content">
            <header>
                <img src="images/Link_logo.jpg" alt="Link logo">
                <h2>
                    Transaction Result
                </h2>
            </header>
            <?php
            include "includes/nav.html";
            ?>
            <main>
                <p>
                    <?php
                    //Getting response code etc...
                    $txnResponseCode=$_GET['vpc_TxnResponseCode'];

                    $receiptNo=getValue("vpc_ReceiptNo");
        			$transactionNo=getValue("vpc_TransactionNo");
                    $amount=getValue("vpc_Amount");
                    $real_amount = round($amount / 100, 2);

                    if ($txnResponseCode==="0") {
                        echo "Transaction was successful! <br>";
                    }
                    else {
                        echo "Transaction was not successful! <br>";
                        echo "Error: ".$cscResultCode=getValue("vpc_CSCResultCode")."<br>";
                        echo "$responseCodes[$txnResponseCode]";
                    }
                    echo "Transaction result has been sent to your email!";

                    // emailing results
                    $subject = "Transaction Result From Link In Myanmar Travel";

                    $message = "<p style=\"text-align: center\">";
                    $message = "<h2 style=\"text-decoration: underline;\">Tranaction Result</h2>";
                    $message .= "Receipt No: ".$receiptNo."<br>";
        			$message .= "Transaction No: ".$transactionNo."<br>";
        			$message .= "Transaction Amount: ".$real_amount." USD<br>";
                    if ($txnResponseCode==="0") {
                        $message .= "Result: Transaction was successful! <br>"
                    }
                    else {
                        $message .= "Result: Transaction was unsuccessful! <br>";
                    }
                    $message .= "</p>";

                    $headers = "FROM: Link In Myanmar <info@linkinmyanmar.com>\r\n";
                    $headers .= "Content-type: text/html\r\n";

                    $Email = $_SESSION['Online_payers_Email'];
                    mail($Email, $subject, $message, $headers);
                    ?>
                </p>
            </main>
        </div>
        <!-- end of content -->
    </body>
</html>
