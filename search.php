<?php
include('connect.php');

// Проверка наличия поискового запроса
if(isset($_GET['search'])) {
    $search = $_GET['search'];
    // Проверка на минимальную длину поискового запроса
    if(strlen($search) >= 3) {
        $sql = "SELECT posts.title, comments.body FROM posts 
                INNER JOIN comments ON posts.id = comments.postId 
                WHERE comments.body LIKE '%$search%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Формирование строки с результатами поиска
            $output = "<pre>";
            while($row = $result->fetch_assoc()) {
                $output .= "Заголовок: " . $row['title'] . "\n";
                $output .= "Комментарий: " . $row['body'] . "\n";
                $output .= "---------------------------------\n";
            }
            $output .= "</pre>";
            // Вывод результатов поиска в консоль
            echo $output;
        } else {
            echo "Ничего не найдено.";
        }
    } else {
        echo "Введите минимум 3 символа для поиска.";
    }
}

// Закрытие соединения с базой данных
$conn->close();

?>