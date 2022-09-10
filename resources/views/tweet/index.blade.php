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
    <div>
        <p>投稿フォーム</p>
        @error('tweet')
        <p style="color:red;">{{$message}}</p>
        @enderror
        <form action="{{route('tweet.create')}}" method="post">
            @csrf
            <label for="tweet-content">つぶやき</label>
            <textarea name="tweet" id="tweet-content" cols="30" rows="10" placeholder="つぶやきを入力"></textarea>
            <button type="submit">投稿</button>
        </form>
    </div>
    <ul>
        @foreach($tweets as $tweet)
        <li>
            <details>
                <summary>{{$tweet->content}}</summary>
                <div>
                    <a href="{{route('tweet.update.index',['tweetId'=>$tweet->id])}}">編集</a>
                </div>
            </details>
        </li>
        @endforeach
    </ul>
</body>

</html>