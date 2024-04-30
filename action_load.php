<?php
include('connect.php');

// Загрузка списка записей
$posts_json = file_get_contents('http://jsonplaceholder.typicode.com/posts');
$posts = json_decode($posts_json, true);

// Загрузка комментариев
$comments_json = file_get_contents('http://jsonplaceholder.typicode.com/comments');
$comments = json_decode($comments_json, true);

// Вставка записей в таблицу posts
foreach ($posts as $post) {
    $sql = "INSERT INTO posts (id, userId, title, body) VALUES ('".$post['id']."', '".$post['userId']."', '".$post['title']."', '".$post['body']."')";
    $conn->query($sql);
}

// Вставка комментариев в таблицу comments
foreach ($comments as $comment) {
    $sql = "INSERT INTO comments (id, postId, name, email, body) VALUES ('".$comment['id']."', '".$comment['postId']."', '".$comment['name']."', '".$comment['email']."', '".$comment['body']."')";
    $conn->query($sql);
}

// Вывод сообщения о завершении загрузки
echo "Загружено " . count($posts) . " записей и " . count($comments) . " комментариев";

// Закрытие соединения с базой данных
$conn->close();

?>