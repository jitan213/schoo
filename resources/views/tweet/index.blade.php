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
        <h1>ツイート一覧</h1>
    </div>
    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-primary" href="/tweets/create">ツイート新規投稿</a>
        </div>
        <div class="col-md-10">
            <table class="table">
                <tbody>
                    @foreach($tweets as $tweet)
                    <tr>
                        <td>{{ $tweet->body }}</td>
                        <td class="text-right"><a href="/tweets/{{ $tweet->id }}">詳細</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>