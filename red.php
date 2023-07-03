<style>
    form {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    
    input[type="text"], select {
        width: 200px;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ddd;
        margin-right: 10px;
        margin-bottom: 10px;
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

<?php
    $id = $_POST['id'];

    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kursach";

    // Создание нового объекта mysqli для подключения к базе данных
    $db = new mysqli($servername,$username,$password,$dbname);

    $select = "select * from students where id=".$id."";

    // Выполнение SQL-запроса и получение результатов
    $query = mysqli_query($db,$select);

    // Извлечение строки с данными из результата запроса
    $row = mysqli_fetch_assoc($query);

    // Проверка значения столбца 'fakultet' и установка переменной $two_fk
    // в соответствующее значение в зависимости от текущего факультета
    $two_fk = $row['fakultet'] == 'Художественный' ? 'Театральный' : 'Художественный';

    echo '<form action="ism.php" method="POST">
        <input type="hidden" name="id" value='.$id.'>
        <input type="text" name="f" value="'.$row['F'].'">
        <input type="text" name="i" value="'.$row['I'].'">
        <input type="text" name="o" value="'.$row['O'].'">
        <input type="text" name="phone" value="'.$row['phone'].'">
        <input type="text" name="mail" value="'.$row['mail'].'">
        <select name="fakultet">
            <option>'.$row['fakultet'].'</option>
            <option>'.$two_fk.'</option>
        </select>
        <input type="text" name="kolvo_zan" value="'.$row['kolvo_zan'].'">
        <input type="text" name="itog" value="'.$row['ITOG'].'">
        <input type="submit" value="Изменить">
    </form>';
?>

