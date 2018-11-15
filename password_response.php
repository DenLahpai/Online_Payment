<?php
require_once "functions.php";

//getting the clients email
$Email = trim($_REQUEST['Email']);

//checking if user (email) exists in our database
$rowCount = table_Online_payers('rowCount', $Email, NULL);

if ($rowCount >= 1) {
    $message = "You password has been sent to your email!";
}
else {
    $message = "We could not find your email in our database. Please contact us for assistance.";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php
    $page_title = "Forgot Password";
    include "includes/head.html";
    ?>
    <body>
        <!-- content -->
        <div class="content">
            <header>
                <img src="images/Link_logo.jpg" alt="Link Logo">
                <h2>
                    <?php echo $message; ?>
                </h2>
            </header>
            <main>
                <ul>
                    <li>
                        <a href="index.php">Go back to login page</a>
                    </li>
                </ul>
            </main>
            <?php include "includes/footer.html"; ?>
        </div>
        <!-- end of content -->
    </body>
</html>
