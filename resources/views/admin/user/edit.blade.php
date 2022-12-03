<x-layout>

    <x-setting :heading="'Edit User: ' . $user->name">
        <form method="POST" action="/admin/users/{{$user->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $user->name)" />
            <x-form.input name="username" :value="old('username', $user->username)"/>
            <x-form.input name="email" :value="old('email', $user->email)"/>

            <div class="mb-8">
                    <input type="checkbox" id="Admin" name="Admin" :value="old('isAdmin', $user->isAdmin)">
                    <label for="Admin">Admin</label><br>
                    <input type="checkbox" id="SuperAdmin" name="SuperAdmin" :value="old('isSuperAdmin', $user->isSuperAdmin)">
                    <label for="SuperAdmin">Super Admin</label><br>
            </div>
            <x-form.button>Update</x-form.button>


        </form>
    </x-setting>
</x-layout>
