<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        font-family: Arial, sans-serif;
    }

    .container {
        width: 400px;
        padding: 20px;
        background-color: #f5f5f5;
        border-radius: 5px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        margin-bottom: 10px;
    }

    input[type="submit"],
    a button {
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
        align-self: center;
    }

    input[type="submit"]:hover,
    a button:hover {
        background-color: #ffc133;
    }

    a {
        text-decoration: none;
        display: flex;
        justify-content: center;
    }

    button {
        margin-top: 10px;
    }
</style>

<div class="container">
    <h2>Редактирование студента</h2>

    <?php
        $f = $_POST['f']; // Получение значения поля "f" из POST-запроса
        $i = $_POST['i']; // Получение значения поля "i" из POST-запроса
        $o = $_POST['o']; // Получение значения поля "o" из POST-запроса
        $phone = $_POST['phone']; // Получение значения поля "phone" из POST-запроса
        $mail = $_POST['mail']; // Получение значения поля "mail" из POST-запроса
        $fakultet = $_POST['fakultet']; // Получение значения поля "fakultet" из POST-запроса
        $kolvo_zan = $_POST['kolvo_zan']; // Получение значения поля "kolvo_zan" из POST-запроса
        $itog = $_POST['itog']; // Получение значения поля "itog" из POST-запроса
        $id = $_POST['id']; // Получение значения поля "id" из POST-запроса

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kursach";

        // Подключение к базе данных
        $db = new mysqli($servername, $username, $password, $dbname);

        // Формирование SQL-запроса для обновления записи студента
        $insert = "UPDATE students
                    SET F = '".$f."',
                        I = '".$i."',
                        O = '".$o."',
                        phone = '".$phone."',
                        mail = '".$mail."',
                        fakultet = '".$fakultet."',
                        kolvo_zan = '".$kolvo_zan."',
                        ITOG = ".$itog."
            
                        where id =".$id."";

        // Выполнение SQL-запроса
        $query = mysqli_query($db, $insert);

        // Проверка результата выполнения запроса
        if ($query){
            // Если запрос выполнен успешно, выводится сообщение об успехе и ссылка на список студентов
            echo '<p style="text-align: center;">Прошло успешно!</p>';
            echo '<a href="vivod_hud.php"><button>К списку</button></a>';
        }
        else {
            // Если запрос не удался, выводится сообщение об ошибке
            echo '<p style="text-align: center;">Not Done</p>';
        }
    ?>
</div>

