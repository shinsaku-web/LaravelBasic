@auth        
<div class="p-4">
    <form action="{{route('tweet.create')}}" method="post">
        @csrf
        <div class="mt-1">
            <textarea class="w-full rounded-md p-2 border-gray-300 focus:ring-blue-400" name="tweet" cols="30" rows="10" placeholder="つぶやきを入力"></textarea>
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
@endauth

@guest
<div class="flex flex-wrap justify-center">
<div class="w-1/2 p-4 flex flex-wrap justify-evenly">
<a class="inline-flex justify-center py-2 px-4 shadow-sm text-sm font-medium rounded-md bg-white text-blue-500 border border-blue-500" href="{{route('login')}}">ログイン</a>
<a class="inline-flex justify-center py-2 px-4 shadow-sm text-sm font-medium rounded-md text-white bg-blue-500" href="{{route('register')}}">会員登録</a>
</div>
</div>    
@endguest