<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['pageTitle'] ?? 'Ошибка' ?></title>
    <link rel="stylesheet" href="/public/style/normalize.css">
    <link rel="stylesheet" href="/public/style/style.css">
    <link rel="stylesheet" href="/public/style/effect.css">
    <link rel="stylesheet" href="/public/style/adaptive.css">
    <link rel="shortcut icon" href="/public/img/logo.ico" type="image/x-icon">

    <?php
    // Динамическое подключение стилей для конкретной страницы
    $currentPage = basename($_SERVER['SCRIPT_NAME'], '.php');
    $pageSpecificStyle = "/public/style/{$currentPage}.css";
    $styles = [];

    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pageSpecificStyle)) {
        $styles[] = $pageSpecificStyle;
    }

    foreach ($styles as $style) {
        echo "<link rel='stylesheet' href='$style'>";
    }
    ?>
</head>

<body>
    <?php
    $headerFile = 'views/partials/header.php';
    if (file_exists($headerFile)) {
        include $headerFile;
    }
    ?>

    <main>
        <?= $data['content'] ?>
    </main>

    <?php
    $footerFile = 'views/partials/footer.php';
    if (file_exists($footerFile)) {
        include $footerFile;
    }
    ?>

    <?php
    // Динамическое подключение скриптов для конкретной страницы
    $pageSpecificScript = "/public/js/{$currentPage}.js";
    // echo $currentPage;
    $scripts = [];

    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pageSpecificScript)) {
        $scripts[] = $pageSpecificScript;
    }

    foreach ($scripts as $script) {
        echo "<script src='$script'></script>";
    }
    ?>
</body>

</html>