<?php
//Запускаем сессию
session_start();

//Добавляем файл подключения к БД
require_once("connect.php");

//Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
$_SESSION["error_messages"] = '';

//Объявляем ячейку для добавления успешных сообщений
$_SESSION["success_messages"] = '';
?>
<?php
/*
    Проверяем была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том что он зашёл на эту страницу напрямую.
*/
if(isset($_POST["btn_submit_register"]) && !empty($_POST["btn_submit_register"])){

    if(isset($_POST["first_name"])){

        //Обрезаем пробелы с начала и с конца строки
        $first_name = trim($_POST["first_name"]);

        //Проверяем переменную на пустоту
        if(!empty($first_name)){
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $first_name = htmlspecialchars($first_name, ENT_QUOTES);
        }else{
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Enter your name</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/form_register.php");

            //Останавливаем скрипт
            exit();
        }


    }else{
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Missing name field</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/form_register.php");

        //Останавливаем скрипт
        exit();
    }


    if(isset($_POST["last_name"])){

        //Обрезаем пробелы с начала и с конца строки
        $last_name = trim($_POST["last_name"]);

        if(!empty($last_name)){
            // Для безопасности, преобразуем специальные символы в HTML-сущности
            $last_name = htmlspecialchars($last_name, ENT_QUOTES);
        }else{

            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Enter your last name</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/form_register.php");

            //Останавливаем  скрипт
            exit();
        }


    }else{

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Last name field is missing</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/form_register.php");

        //Останавливаем  скрипт
        exit();
    }


    if(isset($_POST["email"])){

        //Обрезаем пробелы с начала и с конца строки
        $email = trim($_POST["email"]);

        if(!empty($email)){

            $email = htmlspecialchars($email, ENT_QUOTES);

            //Проверяем формат полученного почтового адреса с помощью регулярного выражения
            $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";

    //Если формат полученного почтового адреса не соответствует регулярному выражению
            if( !preg_match($reg_email, $email)){
                // Сохраняем в сессию сообщение об ошибке.
                $_SESSION["error_messages"] .= "<p class='mesage_error' >You entered an invalid email</p>";

                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем  скрипт
                exit();
            }



//Если кол-во полученных строк ровно единице, значит пользователь с таким почтовым адресом уже зарегистрирован
            if($result_query->num_rows == 1){

                //Если полученный результат не равен false
                if(($row = $result_query->fetch_assoc()) != false){

                    // Сохраняем в сессию сообщение об ошибке.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >A user with this mailing address is already registered</p>";

                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");

                }else{
                    // Сохраняем в сессию сообщение об ошибке.
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Error in the database query</p>";

                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");
                }
                //Останавливаем  скрипт
                exit();
            }

        }else{
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Enter your email</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/form_register.php");

            //Останавливаем  скрипт
            exit();
        }

    }else{
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Email field is missing</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/form_register.php");

        //Останавливаем  скрипт
        exit();
    }


    if(isset($_POST["password"])){

        //Обрезаем пробелы с начала и с конца строки
        $password = trim($_POST["password"]);

        if(!empty($password)){
            $password = htmlspecialchars($password, ENT_QUOTES);

            //Шифруем папроль
            $password = md5($password."top_secret");
        }else{
            // Сохраняем в сессию сообщение об ошибке.
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Enter your password</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/form_register.php");

            //Останавливаем  скрипт
            exit();
        }


        $sql = "INSERT INTO 'users' (first_name, last_name, email, password) VALUES ('.$first_name.', '.$last_name.', '.$email.', '.$password.')";
        if (mysqli_query($conn, $sql)) {
        echo "New recordcreatedsuccessfully";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/form_auth.php");

            //Останавливаем  скрипт
            exit();
        }else{

            $_SESSION["success_messages"] = "<p class='success_message'>Registration completed successfully!!! <br />Now you can log in using your username and password.</p>";

            //Отправляем пользователя на страницу авторизации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/form_auth.php");
        }

        /* Завершение запроса */
        $result_query_insert->close();

//Закрываем подключение к БД
        $mysqli->close();

    }else{
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["error_messages"] .= "<p class='mesage_error'>There is no field for entering a password</p>";

        //Возвращаем пользователя на страницу регистрации
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$address_site."/form_register.php");

        //Останавливаем  скрипт
        exit();
    }
?>
