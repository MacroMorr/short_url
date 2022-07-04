<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="./public/css/app.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />


    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<main role="main" class="container">
    <h1 class="mt-5">Сократитель ссылок.</h1>
    <p class="lead">Протокол "http, https, ftp".</p>

    <form method="POST" id="short_form" action="/short" role="form">
        <div class="input-group mb-3">
            <input name="long_url" id="short_form_long_url" type="url" class="form-control" placeholder="https://mail.example.com/" />
            <div class="input-group-append">
                <input type="submit" class="btn btn-outline-secondary" id="short_form_submit" value="Сократить" />
            </div>
        </div>
        @csrf
    </form>
    <p id="short_form_status" style="display: none;">Запрос выполняется...</p>
    <hr>
    <h3>Ссылки: </h3>
    <ul id="short_urls_list">
        @if (count($short_urls))
            @foreach ($short_urls as $url)
                <li><a href="/{{ $url->short_url }}" target="_blank">{{request()->getSchemeAndHttpHost()}}/{{ $url->short_url }}</a></li>
            @endforeach
        @endif
    </ul>
    @if (!count($short_urls))
        <p id="short_urls_text">Здесь пока ничего нет.</p>
    @endif
</main>

<script src="./public/js/app.js"></script>
</body>
</html>
