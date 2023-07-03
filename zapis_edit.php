<?php

    if (isset($_POST['formSubmit'])) {

        // Параметры подключения к базе данных
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kursach";

        // Извлечение данных в отдельные переменные
        $FIO = $_POST['FIO'];
        $arr = explode(' ', $FIO);

        $phone = $_POST['phone'];
        $mail = $_POST['mail'];
        $fak = $_POST['radio'];

        // Проверка значения радиокнопки fak и присвоение соответствующего названия факультета
        if ($fak == 1)
            $fak = "Художественный";
        else
            $fak = "Театральный";

        $mybrowser = $_POST['mybrowser'];
        $stoim = $_POST['stoim'];

        // Создание нового объекта mysqli для подключения к базе данных
        $sql = new mysqli("localhost", "root", "", "kursach");

        // Формирование SQL-запроса на вставку данных в таблицу students
        $insert = "insert into students (F,I,O,phone,mail,fakultet,kolvo_zan,ITOG)
            values ('" . $arr[0] . "','" . $arr[1] . "','" . $arr[2] . "','" . $phone . "','" . $mail . "','" . $fak . "','" . $mybrowser . "','" . $stoim . "');";

        $query = mysqli_query($sql, $insert);

        // Проверка успешности выполнения запроса и вывод соответствующего сообщения
        if ($query) {
            echo '<div class="message-container">Вы записаны на курс!</div>';
        } else {
            echo '<div class="message-container">Ошибка записи.</div>';
        }
        
        // Вывод ссылки для возврата на страницу факультетов
        echo '<div class="faculty-link">';
        echo '<a href="pages/faculties.html"><button class="custom-button">Назад</button></a>';
        echo '</div>';
    }

?>


<style>
    .faculty-link {
        text-align: center;
        margin-top: 20px;
    }

    .custom-button {
        color: #000;
        background: #d9d9d9;
        border-radius: 20px;
        border: none;
        text-align: center;
        width: 116px;
        height: 28px;
        text-transform: uppercase;
        font-weight: 700;
        font-size: 12px;
        line-height: 20px;
        letter-spacing: 0em;
        transition: 0.1s ease-in;
        cursor: pointer;
        display: block;
        margin: 0 auto;
        margin-top: 10px;
    }

    .custom-button:hover {
        background-color: #ffc133;
    }

    .message-container {
        width: 300px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f5f5f5;
        border-radius: 5px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin-top: 20px;
    }
</style>
