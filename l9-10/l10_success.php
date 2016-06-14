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
    <h1>Спасибо за регистрацию</h1>
</body>

</html>
