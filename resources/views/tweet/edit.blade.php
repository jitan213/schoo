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
        <h1>ツイート編集</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                {!! csrf_field() !!}

                <div class="form-group row">
                    <label class="col-xs-2 col-form-label">ツイート本文</label>
                    <div class="col-xs-10">
                        <input type="text" name="body" class="form-control" placeholder="ツイート本文を入力してください。" value="{{ $tweet->body }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary">投稿する</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
