<x-layout title="投稿 | つぶやきアプリ">
    <x-layout.single>
        <h2 class="text-blue-500 text-center text-4xl font-bold my-8">つぶやきアプリ</h2>
        <div class="p-4">
            <a class="inline-flex justify-center py-2 px-4 shadow-sm text-sm font-medium rounded-md bg-white text-blue-500 border border-blue-500" href="{{route('tweet.index')}}">一覧に戻る</a>
        </div>
        <x-tweet.form.put :tweet="$tweet"></x-tweet.form.put>
    </x-layout.single>
</x-layout>