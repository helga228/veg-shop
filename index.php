<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locus</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            "use strict";
            //================ Проверка email ==================

            //регулярное выражение для проверки email
            var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
            var mail = $('input[name=email]');

            mail.blur(function(){
                if(mail.val() != ''){

                    // Проверяем, если введенный email соответствует регулярному выражению
                    if(mail.val().search(pattern) == 0){
                        // Убираем сообщение об ошибке
                        $('#valid_email_message').text('');

                        //Активируем кнопку отправки
                        $('input[type=submit]').attr('disabled', false);
                    }else{
                        //Выводим сообщение об ошибке
                        $('#valid_email_message').text('Не правильный Email');

                        // Дезактивируем кнопку отправки
                        $('input[type=submit]').attr('disabled', true);
                    }
                }else{
                    $('#valid_email_message').text('Введите Ваш email');
                }
            });

            //================ Проверка длины пароля ==================
            var password = $('input[name=password]');

            password.blur(function(){
                if(password.val() != ''){

                    //Если длина введенного пароля меньше шести символов, то выводим сообщение об ошибке
                    if(password.val().length < 6){
                        //Выводим сообщение об ошибке
                        $('#valid_password_message').text('Минимальная длина пароля 6 символов');

                        // Дезактивируем кнопку отправки
                        $('input[type=submit]').attr('disabled', true);

                    }else{
                        // Убираем сообщение об ошибке
                        $('#valid_password_message').text('');

                        //Активируем кнопку отправки
                        $('input[type=submit]').attr('disabled', false);
                    }
                }else{
                    $('#valid_password_message').text('Введите пароль');
                }
            });
        });
    </script>
</head>
<body>
   <?php
    //Подключение шапки
    require_once("header.php");
   ?>
   <?php
    //Подключение контента
    require_once("home.php");
   ?>
   <?php
    //Подключение подвала
    require_once("footer.php");
   ?>
   <script src="js/script.js"></script>
</body>
</html>
