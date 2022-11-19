<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In</h1>

                <form method="POST" action="/sessions" class="mt-10">
                    @csrf
                    <x-form.input name="email" type="email" autocomplete="username"/>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    <x-form.input name="password" type="password" autocomplete="new-password" />
                    <a href="/password/reset" class="float-right text-blue-500 font-medium flex">Forgot password?</a>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    {{-- Submit button --}}
                    <x-form.button>Log In</x-form.button>

                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
