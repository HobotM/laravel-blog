<x-layout>

    <x-usersetting :heading="'Edit User: ' . $user->name">
        <form method="POST" action="/user/details/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $user->name)" />
            <x-form.input name="username" :value="old('username', $user->username)" />
            <x-form.input name="email" :value="old('email', $user->email)" />
            <x-form.input name="password" :value="old('password', $user->password)" />
           
            <x-form.button>Update</x-form.button>


        </form>
    </x-usersetting>
</x-layout>

