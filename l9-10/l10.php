<?php

if(isset($_POST['submit'])) { //Если нажали «Зарегистрироваться»
    $is_ok = true;

    $messages = array(); // Сюда сообщения

    // В цикле проходимся по данным из формы 
    while (list($key, $val) = each($_POST)) {
        $_POST[$key] = trim($val); // Удаляем лишние пробелы
        $is_ok = false;

        if(empty($_POST[$key]))
            $messages[$key] .= '— Необходимо заполнить поле<br>';
    }

    // Проверка эл.почты
    if(!preg_match("/^\w+@\w+\.\w{2,6}$/i", $_POST['email'])) {
        $messages['email'] .= "— Неправильный адрес! <br>";

        $is_ok = false;
    }

    // Длина логина > 6 символов
    if(strlen($_POST['login']) < 6) {
        $messages['login'] .= "— Минимальная длина логина — 6 символов! <br>";

        $is_ok = false;
    }

    // Длина пароля > 6 символов
    if(strlen($_POST['pass']) < 6) {
        $messages['pass'] .= "— Минимальная длина пароля — 6 символов! <br>";

        $is_ok = false;
    }

    // Логин из латиницы, цифр и подчёркивания
    if(!preg_match("/^[a-z0-9_]*$/i", $_POST['login'])) {
        $messages['login'] .= "— Логин должен состоять только из латиницы, цифр и подчёркивания! <br>";

        $is_ok = false;
    }
    // Пароль из латиницы, цифр и подчёркивания
    if(!preg_match("/^[a-z0-9_]*$/i", $_POST['pass'])) {
        $messages['pass'] .= "— Пароль должен состоять только из латиницы, цифр и подчёркивания! <br>";

        $is_ok = false;
    }

    // Одинаковые ли пароли
    if($_POST['pass'] != $_POST['pass_repeat']) {
        $messages['pass_repeat'] .= "— Пароли не совпадают! <br>";

        $is_ok = false;
    }

    header("Location: l10_success.php");
    exit();
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Регистрация</title>
    <meta charset="utf-8">
    <style>
    * { vertical-align: top; }
    .registration_table {
        font-size: 18px;
        width: 600px;
        margin: 20px auto;
        border-radius: 10px;
        padding: 20px;
        background-color: #F3F3F3;
        border-spacing: 0px;
        border-collapse: collapse;
    }
    
    /* Для неверных данных делаем цвет красный, применится ко всей строке (tr) */
    .registration_table .invalid_field {
        color: red;
    }

    /* И обводку поля делаем красной */
    .registration_table .invalid_field input {
        border: 1px solid red;
    }


    /* Задаём внутренние отступы у ячеек таблицы */
    .registration_table td {
        padding: 4px 10px;
    }
    
    /* Убираем внешний отступ у заголовка */
    .registration_table .head h1 {
        margin-bottom: 0;
    }
    </style>
</head>

<body>
    <form method='POST'>
        <table class="registration_table" action="<?=$_SERVER['PHP_SELF']?>">
            <tr>
                <td colspan="3" class="head">
                    <h1>Регистрация</h1>
                </td>
            </tr>
            <tr <?php if(!empty($messages['login'])) echo 'class="invalid_field"';?>>
                <td>
                    <label for="login">Логин</label>
                </td>
                <td>
                    <input type="text" name="login" id="login" value="<?=$_POST['login']?>" />
                </td>
                <td>
                    <?=$messages['login']?>
                </td>
            </tr>
            <tr <?php if(!empty($messages['pass'])) echo 'class="invalid_field"';?>>
                <td>
                    <label for="pass">Пароль</label>
                </td>
                <td>
                    <input type="password" name="pass" id="pass" />
                </td>
                <td>
                    <?=$messages['pass']?>
                </td>
            </tr>
            <tr <?php if(!empty($messages['pass_repeat'])) echo 'class="invalid_field"';?>>
                <td>
                    <label for="pass_repeat">Повтор пароля</label>
                </td>
                <td>
                    <input type="password" name="pass_repeat" id="pass_repeat" />
                </td>
                <td>
                    <?=$messages['pass_repeat']?>
                </td>
            </tr>
            <tr <?php if(!empty($messages['email'])) echo 'class="invalid_field"';?>>
                <td>
                    <label for="email">Эл. почта</label>
                </td>
                <td>
                    <input type="email" name="email" id="email" value="<?=$_POST['email']?>" />
                </td>
                <td>
                    <?=$messages['email']?>
                </td>
            </tr>
            <tr <?php if(!empty($messages['name'])) echo 'class="invalid_field"';?>>
                <td>
                    <label for="name">Имя</label>
                </td>
                <td>
                    <input type="text" name="name" id="name" value="<?=$_POST['name']?>" />
                </td>
                <td>
                    <?=$messages['name']?>
                </td>
            </tr>
            <tr <?php if(!empty($messages['surname'])) echo 'class="invalid_field"';?>>
                <td>
                    <label for="surname">Фамилия</label>
                </td>
                <td>
                    <input type="text" name="surname" id="surname" value="<?=$_POST['surname']?>" />
                </td>
                <td>
                    <?=$messages['surname']?>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
                <td colspan="2">
                    <input type="submit" name="submit" value="Зарегистрироваться" value="Зарегистрироваться" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
