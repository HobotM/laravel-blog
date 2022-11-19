<x-layout>

    <x-panel class="mt-6 px-0">
        <div class="flex justify-center px-2 mt-2 my-6">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                    style="background-image: url('https://images.unsplash.com/photo-1519834785169-98be25ec3f84?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80')">
                </div>
                <!-- Col -->
                <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <div class="px-8 mb-4 text-center">
                        <h3 class="pt-4 mb-2 text-2xl">Enter a new password</h3>
                        <p class="mb-4 text-sm text-black-500">
                            Please enter your email and new password
                        </p>
                    </div>
                    <form action="{{ route('reset.password.post') }}" method="POST"
                        class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <!-- Email -->
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700 text-center" for="email">
                                Email
                            </label>
                            <input class="border border-gray-400 p-2 w-full" type="email" placeholder="Enter Email Address..." name="email" id="email" value="{{old('email')}}"
                                required>
                                @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700 text-center" for="password">
                                Password
                            </label>
                            <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password"
                                required>
                                @error('password')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                        </div>
                        <!-- Confirm Password -->
                        <div class="mb-6">

                            <label for="password"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700 text-center">Confirm Password</label>

                            <input id="password_confirmation" class="border border-gray-400 p-2 w-full" type="password"
                                name="password_confirmation" required />

                            @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>



                            <x-form.button>Reset Password</x-form.button>
                    </form>
                </div>
            </div>
        </div>
    </x-panel>
</x-layout>
