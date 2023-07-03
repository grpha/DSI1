<?php
//ВЫВОД ПОЛЬОВАТЕЛЕЙ
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

// Выполняем SQL-запрос для выборки студентов с факультетом "Художественный"
$select = 'SELECT * FROM students WHERE fakultet="Художественный"';
$result = $conn->query($select);

// Выводим данные о студентах
if ($result && $result->num_rows > 0) {
    while ($pol = $result->fetch_assoc()) {
        echo ' ' . $pol['id'] . ' ';
        echo ' ' . $pol['F'] . ' ';
        echo ' ' . $pol['I'] . ' ';
        echo ' ' . $pol['O'] . ' ';
        echo ' ' . $pol['phone'] . ' ';
        echo ' ' . $pol['mail'] . ' ';
        echo ' ' . $pol['fakultet'] . ' ';
        echo ' ' . $pol['kolvo_zan'] . ' ';
        echo ' ' . $pol['ITOG'] . ' ';
    }
} else {
    echo 'Нет данных о студентах';
}

echo '</table>';

// Закрываем соединение с базой данных
$conn->close();

?>
