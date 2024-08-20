<?php
// Получаем URI запроса без начальных и конечных слэшей
$url = trim($_SERVER['REQUEST_URI'], '/');
$controller = $newsController;
$action = null;
$params = [];

if ($url === 'index.php' || $url === '') {
    // Перенаправление на страницу новостей
    header('Location: /news/');
} elseif ($url === 'news') {
    // Главная страница новостей (первая страница)
    $action = 'actionList';
    $params = [1];
} elseif (preg_match('/^news\/page-(\d+)\/?$/', $url, $matches)) {
    // Постраничный вывод новостей
    $action = 'actionList';
    $params = [(int)$matches[1]];
} elseif (preg_match('/^news\/(\d+)\/?$/', $url, $matches)) {
    // Вывод конкретной новости
    $action = 'actionDetail';
    $params = [(int)$matches[1]];
} else {
    // Если маршрут не найден, показываем страницу ошибки
    $action = 'actionError';
}

// Вызываем метод контроллера, если action установлен
if ($action) {
    call_user_func_array([$controller, $action], $params);
}

