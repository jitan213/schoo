<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Twitter風アプリ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>@yield('page-title')</h1>
    </div>
    <div class="row">
        @yield('content')
    </div>
</div>
</body>
</html>
