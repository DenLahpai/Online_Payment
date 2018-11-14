<?php
require_once "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //getting data to the table when the form is submitted
    $Email = trim($_REQUEST['Email']);

    //checking if user (email) exists in our database
    $rowCount = table_Online_payers('rowCount', $Email, NULL);

    if ($rowCount >= 1) {
        // emailing the password if email exists in our database
        $rows_Online_payers = table_Online_payers('select-one', $Email, NULL);
        foreach ($rows_Online_payers as $row_Online_payers) {
            $Password = $row_Online_payers->Password;
        }
        // emailing password
        $subject = "Password Reset Payment Gateway";

        $message = "Your password for Link In Myanmar payment gateway is: <br>";
        $message .= "<span style=\"font-weight: bold; text-align: center\">";
        $message .= $Password;
        $message .= "</span>";

        $headers = "FROM: Link In Myanmar <info@linkinmyanmar.com>\r\n";
        $headers .= "Content-type: text/html\r\n";
        mail($Email, $subject, $message, $headers);
        header("location: password_response.php?Email=$Email"); //TODO
    }
    else {
        //header to password_response.php page. Once there inform the viewer that his email couldn't be found
        header("location: password_response.php?Email=$Email"); //TODO
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php
    $page_title = "Forgot password";
    include "includes/head.html";
    ?>
    <body>
        <!-- content -->
        <div class="content">
            <!-- header -->
            <header>
                <img src="images/Link_logo.jpg" alt="Link Logo">
                <h2>
                    Forgot your password?
                </h2>
            </header>
            <!-- end of header -->
            <!-- main -->
            <main>
                <form action="#" method="post">
                    <ul>
                        <li>
                            Please let us know your email.
                        </li>
                        <li>
                            <input type="text" name="Email" id="Email" placeholder="Your Email">
                        </li>
                        <li>
                            <button type="submit" class="button submit" name="buttonSubmit">Submit</button>
                        </li>
                    </ul>
                </form>
            </main>
            <!-- end of main -->
            <?php include "includes/footer.html"; ?>
        </div>
        <!-- end of content -->
    </body>
</html>
