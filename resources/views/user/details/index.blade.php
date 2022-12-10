
<x-layout>
    <x-usersetting heading="My Details">
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
                    
                    <form method="POST" action="/admin/users/{{ $user->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <x-form.input name="name" :value="Auth::user()->id()->old('name', $user->name)" />
                        <x-form.input name="username" :value="old('username', $user->username)" />
                        <x-form.input name="email" :value="old('email', $user->email)" />

                        
                        <x-form.button>Update</x-form.button>


                    </form>
                    
                    </div>
                    </tbody>
                    
                </table>
                
                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
                </div>
            </div>
        </div> 
    </x-usersetting>
</x-layout>
