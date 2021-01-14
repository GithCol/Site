<html>
    <head>
        <title>Регистрация</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

        <?php
        $empty_check = true;
        $email_class_name = 'hide';
        $name_class_name = 'hide';
        $password_class_name = 'hide';

        $inputemail_class_name = '';
        $inputname_class_name = '';
        $inputpassword_class_name = '';
        

        if($_POST['send'])
        {
            if ( empty($_POST['login']) )
            {
                $name_class_name = 'error';
                $inputname_class_name = 'red_border';
                $empty_check = false;
            }

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
                        /*$sql = 'INSERT INTO my_db (name, email, password) values (?, ?, ?)';
                        $stmt = mysqli_prepare($link, $sql);
                        mysqli_stmt_bind_param($stmt, 'sss', $_POST['login'], $_POST['email'], md5($_POST['password']));
                        $result = mysqli_stmt_get_result($stmt);*/

                        $user_name = mysqli_real_escape_string($link, $_POST['login']);
                        $user_email = mysqli_real_escape_string($link, $_POST['email']);
                        $user_password = mysqli_real_escape_string($link, md5($_POST['password']));
                        $sql = "insert into users (name, email, password) values ('$user_name', '$user_email', '$user_password')";

                        $result = mysqli_query($link, $sql);
                        if($result === false)
                            echo('Произошла ошибка: ' . mysqli_error($link));
                        else
                            echo('Успешно');
                    }
                        $email_class_name = 'hide';
                        $name_class_name = 'hide';
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

        <h2>Регистрационная форма</h2>
        <form name="registration_form" method="post" action="">

            <label>Имя:</label><br>
            <input class="<?php echo($inputname_class_name) ?>" type="text" name="login" value=""><br>
            <label class="<?php echo($name_class_name) ?>">Введите логин</label><br><br>


            <label>E-mail:</label><br>
            <input class="<?php echo($inputemail_class_name) ?>" type="text" name="email" value=""><br>
            <label class="<?php echo($email_class_name) ?>">Введите корректный e-mail</label><br><br>


            <label>Пароль:</label><br>
            <input class="<?php echo($inputpassword_class_name) ?>" type="password" name="password" value=""><br>
            <label class="<?php echo($password_class_name) ?>">Введите пароль</label><br><br>


            <input type="submit" name="send" value="Зарегестрироваться">

        </form>
    </body>
</html>