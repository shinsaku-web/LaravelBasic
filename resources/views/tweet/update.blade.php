<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>つぶやきアプリ</title>
</head>

<body>
    <h1>つぶやきアプリ</h1>
    <a href="{{route('tweet.index')}}">一覧に戻る</a>
    <div>
        <p>投稿フォーム</p>
        @if (session('feedback.success'))
            <p style="color:green;">{{session('feedback.success')}}</p>
        @endif
        @error('tweet')
        <p style="color:red;">{{$message}}</p>
        @enderror
        <form action="{{route('tweet.update.put',['tweetId'=>$tweet->id])}}" method="post">
            @method('PUT')
            @csrf
            <label for="tweet-content">つぶやき140文字まで</label>
            <textarea name="tweet" id="tweet-content" cols="30" rows="10" placeholder="つぶやきを入力">{{$tweet->content}}
            </textarea>
            <button type="submit">投稿</button>
        </form>
    </div>
</body>

</html>