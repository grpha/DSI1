<?php
//УДАЛЕНИЕ_ТЕСТ
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kursach";

$db = new mysqli($servername, $username, $password, $dbname);


// Установка значения ID для удаления (может быть заменено на конкретное значение)
$id = 1;

// Создание запроса на удаление
$del = "DELETE FROM students WHERE id = " . $id;

// Выполнение запроса
$q = mysqli_query($db, $del);

// Проверка успешности выполнения запроса и вывод соответствующего сообщения
if ($q) {
    echo "Запись успешно удалена!";
} else {
    echo "Ошибка при удалении записи: " . mysqli_error($db);
}

// Закрытие соединения с базой данных
mysqli_close($db);
?>
