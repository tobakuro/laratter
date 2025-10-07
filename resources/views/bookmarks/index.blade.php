<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('ブックマーク一覧') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          @if ($bookmarks->isEmpty())
            <p class="text-gray-600 dark:text-gray-400">ブックマークはまだありません。</p>
          @else
            @foreach ($bookmarks as $bookmark)
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
              <p class="text-gray-800 dark:text-gray-300">{{ $bookmark->tweet->tweet }}</p>
              <p class="text-gray-600 dark:text-gray-400 text-sm">投稿者: {{ $bookmark->tweet->user->name }}</p>
              <div class="flex gap-4 mt-2">
                <a href="{{ route('tweets.show', $bookmark->tweet) }}" class="text-blue-500 hover:text-blue-700">詳細を見る</a>
                <form action="{{ route('bookmarks.destroy', $bookmark->tweet) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500 hover:text-red-700">ブックマーク解除</button>
                </form>
              </div>
            </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
