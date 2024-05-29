<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Деталі студента</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Деталі студента</h1>

    <?php
    // Підключення до бази даних
    $connection = mysqli_connect("localhost", "admin", "admin", "examGrades_db");

    // Перевірка з'єднання
    if (!$connection) {
        die("Помилка з'єднання: " . mysqli_connect_error());
    }

    // Отримання student_id з URL
    $student_id = $_GET['student_id'];

    // Запит на вибірку даних про конкретного студента за його student_id
    $sql = "SELECT * FROM students WHERE id = $student_id";
    $result = mysqli_query($connection, $sql);

    // Перевірка результату запиту
    if (mysqli_num_rows($result) > 0) {
        // Виведення даних про студента у вигляді таблиці
        echo "<table>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<td>" . $row["id"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Last Name</th>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Group Name</th>";
            echo "<td>" . $row["group_name"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Ticket Number</th>";
            echo "<td>" . $row["ticket_number"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Subject</th>";
            echo "<td>" . $row["subject_"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Grade</th>";
            echo "<td>" . $row["grade"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Студент не знайдений</p>";
    }

    // Закриття з'єднання з базою даних
    mysqli_close($connection);
    ?>
</body>
</html>
