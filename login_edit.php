<style>
    .custom-button {
        color: rgb(0, 0, 0);
        background: #D9D9D9;
        border-radius: 20px;
        border: none;
        text-align: center; 
        width: 250px;
        height: 46px;
        text-transform: uppercase;
        font-weight: 700;
        font-size: 15px;
        line-height: 20px;
        letter-spacing: 0em;
        text-align: center;
        transition: 0.1s ease-in;
        cursor: pointer;
}

.custom-button:hover {
  background-color:  #FFC133;
}

</style>


<?php

    session_start(); // Начало сеанса сессии

    // Подключение к базе данных
    $href = mysqli_connect('localhost', 'root', '', 'kursach');

    // Получение значения полей "number" и "pass" из POST-запроса
    $number = $_POST['number'];
    $pass = $_POST['pass'];

    // Проверка, заполнены ли оба поля
    if ($number == "" || $pass == "") {
        // Если не заполнены, выводится сообщение об ошибке
        echo "<div style='text-align: center;'>
                <p>Не введены некоторые поля</p>
                <a href='../index.html'><button class='custom-button'>На главную страницу</button></a>
              </div>";
        exit();
    }

    // Формирование SQL-запроса для выборки записи с заданным логином и паролем
    $select = "SELECT * from logpass WHERE login='$number' and pass='$pass'";

    // Выполнение SQL-запроса
    $query = mysqli_query($href, $select);

    // Получение количества строк, удовлетворяющих запросу
    $count = $query->num_rows;

// Извлечение ассоциативного массива с данными пользователя
$arr = mysqli_fetch_assoc($query);

// Проверка, были ли получены данные из базы данных
if ($arr !== null) {
    // Сохранение значений ID пользователей в сессионных переменных
    $_SESSION['rab_id'] = $arr['rab_id'];
    $_SESSION['id'] = $arr['id'];

    // Проверка результата выполнения запроса
    if ($count == 0) {
        // Если не удалось войти, выводится сообщение об ошибке
        echo "<div style='text-align: center;'>
                <p>Не удалось войти</p>
                <a href='../index.html'><button class='custom-button'>На главную страницу</button></a>
              </div>";
    } else {
        // Если удалось войти, выводится сообщение об успешном входе
        echo "<div style='text-align: center;'>
                <p>Удалось войти</p>
                <a href='../adminka/adm_index.htm'><button class='custom-button'>На главную страницу</button></a>
              </div>";
    }
    } else {
        // Если данные не были получены, выводится сообщение об ошибке
        echo "<div style='text-align: center;'>
                <p>Не удалось войти</p>
                <a href='../index.html'><button class='custom-button'>На главную страницу</button></a>
              </div>";
    }

?>

