<?php
    $id = $_POST['id']; // Получение значения поля "id" из POST-запроса

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kursach";

    // Подключение к базе данных
    $db = new mysqli($servername, $username, $password, $dbname);

    // Формирование SQL-запроса для удаления записи студента
    $del = "DELETE FROM students WHERE `students`.`id` = ".$id."";

    // Выполнение SQL-запроса
    $q = mysqli_query($db, $del);

    // Проверка результата выполнения запроса
    if ($q) {
        // Если запрос выполнен успешно, выводится сообщение об успехе и ссылка на предыдущую страницу
        echo '<div class="centered-container">';
        echo '<div class="window-container">';
        echo '<p style="text-align: center;">Удаление прошло успешно!</p>';
        echo '<a href="adminka/adm_faculties.htm" style="text-decoration: none;"><button class="custom-button">Назад</button></a>';
        echo '</div>';
        echo '</div>';
    }
?>

<style>
    .centered-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .window-container {
        width: 300px;
        padding: 20px;
        background-color: #f5f5f5;
        border-radius: 5px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
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
        margin-top: 10px;
    }

    .custom-button:hover {
        background-color: #ffc133;
    }
</style>
