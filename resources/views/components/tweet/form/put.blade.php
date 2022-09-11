@props(['tweet'])
<div class="p-4">
    <form action="{{route('tweet.update.put',['tweetId'=>$tweet->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="mt-1">
            <textarea class="w-full rounded-md p-2 border-gray-300 focus:ring-blue-400" name="tweet" cols="30" rows="10" placeholder="つぶやきを入力">{{$tweet->content}}</textarea>
        </div>
        <p class="mt-2 text-sm text-gray-500">140文字まで</p>
        @if (session('feedback.success'))
        <p style="color:green">{{session('feedback.success')}}</p>
        @endif
        @error('tweet')
        <p style="color:red;">{{$message}}</p>
        @enderror
        <div class="flex flex-wrap justify-end">
            <x-element.button>
                つぶやく
            </x-element.button>
        </div>
    </form>
</div>