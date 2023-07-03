<style>
    .faculty-link {
        display: inline-block;
        margin-bottom: 10px;
    }
    
    .faculty-link button {
        color: rgb(0, 0, 0);
        background: #D9D9D9;
        border-radius: 20px;
        border: none;
        text-align: center; 
        width: 145px;
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
    
    .faculty-link button:hover {
        background: #FFC133;
        transition: 0.1s ease-in;
    }
    
    .faculty-link button:active {
        transform: translateY(2px);
    }
    
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }
    
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    tr:hover {
        background-color: #f5f5f5;
    }
    
    form {
        display: inline-block;
        margin-right: 10px;
    }
    
    input[type="submit"] {
        color: rgb(0, 0, 0);
        background: #D9D9D9;
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
        text-align: center;
        transition: 0.1s ease-in;
        cursor: pointer;
    }
    
    input[type="submit"]:hover {
        background-color: #FFC133;
    }
</style>

<div class="faculty-link">
    <a href="adminka/adm_faculties.htm"><button>К факультетам</button></a>
</div>
<br>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kursach";

    // Создание нового объекта mysqli для подключения к базе данных
    $db = new mysqli($servername, $username, $password, $dbname);

    // SQL-запрос с сортировкой по алфавиту через атрибут F
    $select = 'SELECT * FROM `students` WHERE fakultet="Художественный" ORDER BY F';

    // Выполнение SQL-запроса и получение результатов
    $znach = mysqli_query($db, $select);

    echo '<table>';
    echo '<tr>
            <th>id</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Номер телефона</th>
            <th>Почта</th>
            <th>Факультет</th>
            <th>Количество занятий</th>
            <th>Итог</th>
            <th></th>
            <th></th>
        </tr>';

    while ($pol = mysqli_fetch_array($znach)) {
        echo '<tr>';
        echo '<td>' . $pol['id'] . '</td>'; // Вывод значения столбца 'id'
        echo '<td>' . $pol['F'] . '</td>'; // Вывод значения столбца 'F'
        echo '<td>' . $pol['I'] . '</td>'; // Вывод значения столбца 'I'
        echo '<td>' . $pol['O'] . '</td>'; // Вывод значения столбца 'O'
        echo '<td>' . $pol['phone'] . '</td>'; // Вывод значения столбца 'phone'
        echo '<td>' . $pol['mail'] . '</td>'; // Вывод значения столбца 'mail'
        echo '<td>' . $pol['fakultet'] . '</td>'; // Вывод значения столбца 'fakultet'
        echo '<td>' . $pol['kolvo_zan'] . '</td>'; // Вывод значения столбца 'kolvo_zan'
        echo '<td>' . $pol['ITOG'] . '</td>'; // Вывод значения столбца 'ITOG'

        echo '<td>
                <form action="red.php" method="POST">
                    <input type="hidden" name="id" value="' . $pol['id'] . '">
                    <input type="submit" value="Редактировать">
                </form>
            </td>';

        echo '<td>
                <form action="delete_teatr.php" method="POST">
                    <input type="hidden" name="id" value="' . $pol['id'] . '">
                    <input type="submit" value="Удалить">
                </form>
            </td>';

        echo'</tr>';
    }
    
    echo '</table>';
?>


