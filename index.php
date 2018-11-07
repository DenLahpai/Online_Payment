<?php
require "../conn.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php
    $page_title = "Welcome";
    include "includes/head.html";
    ?>
    <body>
        <!-- content -->
        <div class="content">
            <!-- header -->
            <div class="header">
                <img src="images/Link_logo.jpg" alt="Link Logo">
                <h2>
                    Welcome to our online payment gateway!
                    <button type="button" class="button Next" name="buttonProceed" id="openModal">Proceed</button>
                </h2>
            </div>
            <!-- end of header -->
            <!-- index -->
            <div class="index">

            </div>
            <!-- end of index -->
        </div>
        <!-- end of content -->
        <!-- modal -->
        <div class="modal">
            <!-- modal-content -->
            <div class="modal-content">
                <!-- modal-header -->
                <div class="modal-header">
                    <h4>
                        <span class="big right" id="closeModal">&times;</span><br>
                        Login
                    </h4>
                </div>
                <!-- end of modal-header -->
                <!-- modal-body -->
                <div class="modal-body">
                    <form class="login_form" action="login.php" method="post">
                        <ul>
                            <li>
                                <input type="email" name="Email" id="Email" placeholder="Email" required>
                            </li>
                            <li>
                                <input type="password" name="Password" id="Password" placeholder="Password" required>
                            </li>
                            <li>
                                <a href="forgot_password.php">
                                    Forgot your password?
                                </a>
                            </li>
                            <li>
                                <button type="submit" class="button submit" name="buttonSubmit">Login</button>
                            </li>
                        </ul>
                    </form>
                </div>
                <!-- end of modal-body -->
            </div>
            <!-- end of modal-content -->
        </div>
        <!-- end of modal -->
    </body>
    <script type="text/javascript" src="js/scripts.js"></script>
</html>
