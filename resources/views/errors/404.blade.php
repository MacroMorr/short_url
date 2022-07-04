<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="./public/css/app.css" />

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Страница не найдена | Ошибка 404</title>
</head>
<body>
<main role="main" class="container">
    <h1 class="mt-5">Этой страницы не существует</h1>
    <p class="lead">Вернитесь на главную страницу <a href="/">главную</a>.</p>
</main>
</body>
</html>
