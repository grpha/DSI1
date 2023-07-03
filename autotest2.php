<?php
//ЗАПИСЬ_ТЕСТ
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kursach";

// Создаем подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение на ошибки
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Функция для выполнения запросов и проверки результата
function executeQuery($conn, $query)
{
    if ($conn->query($query) === TRUE) {
        echo 'Успешная запись!';
    } else {
        echo 'Запись не удалась';
    }
}

// Тестовые данные
$FIO = "Иванов Иван Иванович";
$phone = "1234567890";
$mail = "example@example.com";
$fak = 1;
$mybrowser = "Chrome";
$stoim = 100;

// Разбиваем ФИО на отдельные части
$arr = explode(' ', $FIO);

// Формируем SQL-запрос для вставки данных
$insert = "INSERT INTO students (F, I, O, phone, mail, fakultet, kolvo_zan, ITOG)
            VALUES ('" . $arr[0] . "','" . $arr[1] . "','" . $arr[2] . "','" . $phone . "','" . $mail . "','" . $fak . "','" . $mybrowser . "','" . $stoim . "')";

// Выполняем SQL-запрос
executeQuery($conn, $insert);

// Закрываем соединение с базой данных
$conn->close();
?>
