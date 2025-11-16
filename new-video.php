<?php

require_once __DIR__ . '/src/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($url && $title) {
        $pdo = Database::getConnection();
        
        $sql = 'INSERT INTO videos (url, title) VALUES (:url, :title)';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':url', $url);
        $statement->bindValue(':title', $title);
        
        if ($statement->execute()) {
            header('Location: index.php?sucesso=1');
            exit();
        } else {
            header('Location: pages/send-video.html?erro=1');
            exit();
        }
    } else {
        header('Location: pages/send-video.html?erro=1');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}