<x-layout title="TOP | つぶやきアプリ">
    <x-layout.single>
        <h2 class="text-blue-500 text-center text-4xl font-bold my-8">つぶやきアプリ</h2>
        <x-tweet.form.post></x-tweet.form.post>
        <ul class="rounded-md mt-8 overflow-hidden shadow-sm">
            @foreach($tweets as $tweet)
            <li class="bg-white first:border-t-0 border-t border-gray-200 p-4">
                    <div class="bg-blue-300 px-2 py-1 text-sm rounded-full inline-flex text-white">{{$tweet->user->name}}</div>
                        <br>
                        <p class="mt-4">
                            {{$tweet->content}}
                        </p>
                    @if ($ownID === $tweet->user_id)                  
                    <div class="flex space-x-4 mt-4">
                        <a class="inline-flex justify-center py-2 px-4 shadow-sm text-sm font-medium rounded-md text-white bg-blue-500" href="{{route('tweet.update.index',['tweetId'=>$tweet->id])}}">編集</a>
                        <form action="{{route('tweet.delete',['tweetId'=>$tweet->id])}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="inline-flex justify-center py-2 px-4 shadow-sm text-sm font-medium rounded-md text-white bg-red-500" type="submit">削除</button>
                        </form>
                    </div>
                    @else
                    <p class="mt-4 text-gray-300">編集できません</p>
                    @endif
            </li>
            @endforeach
        </ul>
    </x-layout.single>
</x-layout>