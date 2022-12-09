<x-layout>

    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6 ">
        @if ($posts->count())
          <x-post-grid :posts="$posts"/>

          {{$posts->links()}}

        @else
            <p class="text-center">No posts yet. Please check back later or create your own one!</p>
        @endif

    </main>
</x-layout>
