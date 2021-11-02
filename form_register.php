<?php
//Подключение шапки
require_once("header.php");
?>
    <link rel="stylesheet" href="/css/style.css"/>

        <div class="forma">
            <div class="register" id="form_register">
                <div class="content">
                    <h2>Sign up</h2>
                    <form action="register.php" method="post">
                        <table>
                            <tbody><tr>
                                <td>
                                    <input type="text" name="first_name" placeholder="Name" required="required">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="last_name" placeholder="First name" required="required">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="email" name="email"   placeholder="Email" required="required"><br>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="password" placeholder="Password" required="required"><br>

                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="btn_submit_register" value="Go!">
                                </td>
                            </tr>
                            </tbody></table>
                    </form>
                </div>
            </div>
        </div>
    <?php
//Подключение подвала
require_once("footer.php");
    ?>