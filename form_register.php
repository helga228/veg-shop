<?php
//Подключение шапки
require_once("header.php");
?>
    <link rel="stylesheet" href="/css/style.css"/>
    <!-- Блок для вывода сообщений -->
    <div class="block_for_messages">
        <?php
        //вывод сообщения о ошибках
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];

            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }

        //вывод сообщений об отсутствии ошибок
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];

            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
        ?>
    </div>

<?php
//Проверяем, авторизован ли пользователь
if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
    ?>
        <div class="forma">
            <div class="register" id="form_register">
                <div class="content">
                    <h2>Sign up</h2>
                    <form action="register.php" method="post" name="form_register">
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
                                    <span id="valid_email_message" class="mesage_error"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" name="password" placeholder="Password" required="required"><br>
                                    <span id="valid_password_message" class="mesage_error"></span>
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
}else{
    ?>
    <div id="authorized">
        <h2>You are already registered</h2>
    </div>
    <?php
}

//Подключение подвала
require_once("footer.php");
    ?>