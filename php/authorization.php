<html>
    <head>
        <title>Авторизация</title>
        <link rel="stylesheet" type="text/css" href="authstyle.css">
    </head>
    <body>

        <?php
        $empty_check = true;
        $email_class_name = 'hide';
        $password_class_name = 'hide';

        $inputemail_class_name = '';
        $inputpassword_class_name = '';
        

        if($_POST['send'])
        {
            if ( empty($_POST['email']) )
            {
                $email_class_name = 'error';
                $inputemail_class_name = 'red_border';
                $empty_check = false;
            }

            if ( empty($_POST['password']) )
            {
                $password_class_name = 'error';
                $inputpassword_class_name = 'red_border';
                $empty_check = false;
            }


            if($empty_check === true)
            {
                $email = $_POST['email'];
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $link = mysqli_connect('localhost','root','root','my_db');
                    if($link === false)
                    {
                        echo('Нет подключения к БД');
                    }
                    else
                    {
                        $user_email = mysqli_real_escape_string($link, $_POST['email']);
                        $user_password = mysqli_real_escape_string($link, md5($_POST['password']));
                        
                        $sql = "select * from users where email='$user_email' and password='$user_password'";

                        $result = mysqli_query($link, $sql);
                        if($result === false)
                            echo('Произошла ошибка: ' . mysqli_error($link));
                        else {
                            if(mysqli_fetch_array($result) > 0)
                            {
                                echo('Вы вошли');
                            } else {
                                echo('Неверный E-mail или пароль');
                            }
                            
                        }
                    }
                        $email_class_name = 'hide';
                        $password_class_name = 'hide';
                    
                }
                else
                {
                    $inputemail_class_name = 'red_border';
                    $email_class_name = 'error';
                }
            }
        }
        ?>

        <h1>Вход на сайт</h1>
        <form name="registration_form" method="post" action="">


            <label>E-mail:</label><br>
            <input class="<?php echo($inputemail_class_name) ?>" type="text" name="email" value=""><br>
            <label class="<?php echo($email_class_name) ?>">Введите корректный e-mail</label><br><br>


            <label>Пароль:</label><br>
            <input class="<?php echo($inputpassword_class_name) ?>" type="password" name="password" value=""><br>
            <label class="<?php echo($password_class_name) ?>">Введите пароль</label><br><br>


            <input type="submit" name="send" value="Войти">

        </form>
    </body>
</html>