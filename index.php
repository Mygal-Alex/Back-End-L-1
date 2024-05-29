<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Виведення даних з таблиці бази даних на веб-сторінку</title>
</head>
<body>
    <h1>Дані з таблиці "teachers"</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Last Name</th>
            <th>first_name</th>
            <th>subject_</th>
            <th>student_id</th>
        </tr>
        <?php
        // Підключення до бази даних
        $connection = mysqli_connect("localhost", "admin", "admin", "examGrades_db");

        // Перевірка з'єднання
        if (!$connection) {
            die("Помилка з'єднання: " . mysqli_connect_error());
        }

        // Запит на вибірку даних
        $sql = "SELECT * FROM teachers";
        $result = mysqli_query($connection, $sql);

        // Перевірка результату запиту
        if (mysqli_num_rows($result) > 0) {
            // Виведення даних у вигляді таблиці
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["subject_"] . "</td>";
                echo "<td><a href='student_details.php?student_id=" . $row["student_id"] . "'>" . $row["student_id"] . "</a></td>"; // Посилання на сторінку з деталями студента
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Немає даних у таблиці</td></tr>";
        }

        // Закриття з'єднання з базою даних
        mysqli_close($connection);
        ?>
    </table>
</body>
</html>