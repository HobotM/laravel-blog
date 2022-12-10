
<x-layout>
    <x-setting heading="My Details">
        <!-- component -->
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">

            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                <table class="min-w-full">

                    <tbody class="bg-white">
                    <div class="flex-shrink-0 content-center text-sm mx-auto">
                    <img src="https://i.pravatar.cc/100?u={{Auth::user()->id}}" width="150" height="150" class="rounded-xl mx-auto" alt="">
                    <h2 class="text-center font-semibold text-2xl">Name: {{Auth::user()->name}}</h2>
                    <h2 class="text-center font-semibold text-2xl">Username: {{Auth::user()->username}}</h2>
                    <h2 class="text-center font-semibold text-2xl">Email: {{Auth::user()->email}}</h2>
                    </div>
                    </tbody>
                    
                </table>
                
                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
                </div>
            </div>
        </div>


        
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">

            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                <table class="min-w-full">

                    <tbody class="bg-white">
                    <div class="flex-shrink-0 content-center text-sm mx-auto">                  

                    <form method="POST" action="{{ route('update-password') }}" enctype="multipart/form-data">
                        @csrf
                        
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <!-- old Password -->
                            <div class="mb-3">
                                <label for="oldPassword" :value="__('Password')"
                                    class="block mb-2 uppercase font-bold text-xs text-gray-700" />
                                Old Password
                                </label>
                                <input class="border border-gray-400 p-2 w-full" id="oldPassword" type="password" name="old_password" placeholder="Old Password"
                                    required autocomplete="new-password" />
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                              <!-- New Password -->
                              <div class="mb-3">
                                <label for="newPassword" :value="__('Password')"
                                    class="block mb-2 uppercase font-bold text-xs text-gray-700" />
                                New Password
                                </label>
                                <input class="border border-gray-400 p-2 w-full" id="newPassword" type="password" name="new_password" placeholder="New Password"
                                    required autocomplete="new-password" />
                                @error('new_password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                             <!-- confirm New Password -->
                             <div class="mb-3">
                                <label for="confirmNewPassword" :value="__('Password')"
                                    class="block mb-2 uppercase font-bold text-xs text-gray-700" />
                                Confirm New Password
                                </label>
                                <input class="border border-gray-400 p-2 w-full" id="confirmNewPassword" type="password" name="new_password_confirmation" placeholder="Confirm new Password"
                                    required autocomplete="new-password" />
                                    @error('new_password_confirmation')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                               
                            </div>

                        </div>

                        <x-form.button>Update</x-form.button>


                    </form>
                    
                    </div>
                    </tbody>
                    
                </table>
                
                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
                </div>
            </div>
        </div> 
    </x-setting>
</x-layout>
