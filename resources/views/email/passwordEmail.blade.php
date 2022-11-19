<x-panel class="mt-6 px-0">
    <div class="flex justify-center px-2 mt-2 my-6">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
            <!-- Col -->
            <div
                class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                style="background-image: url('https://images.unsplash.com/photo-1516339901601-2e1b62dc0c45?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=671&q=80')"
            ></div>
            <!-- Col -->
            <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                <div class="px-8 mb-4 text-center">
                    <h3 class="pt-4 mb-2 text-2xl">You can reset password from bellow link:</h3>
                    <p class="mb-4 text-sm text-black-500">
                        <a href="{{ route('reset.password.get', $token) }}">Reset Password</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-panel>
