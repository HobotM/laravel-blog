@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf
            <header class="flex items-center ">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" width="40" height="40" class="rounded-full"
                    alt="">

                <h2 class="ml-4">
                    Want to participate?
                </h2>


            </header>
            <div class="mt-6">
                <x-form.textarea name="body"/>


                <x-form.error name="body"/>

            </div>
            <div class="flex justify-end mt-8 border-t border-gray-200 pt-6">
                <x-form.button>Submit</x-form.button>
            </div>

        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a class="hover:underline" href="/register">Register</a> or <a class="hover:underline" href="/login">Log in</a> to
        leave a comment
    </p>
@endauth
