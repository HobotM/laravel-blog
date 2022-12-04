<x-layout>

    <x-setting :heading="'Edit User: ' . $user->name">
        <form method="POST" action="/admin/users/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $user->name)" />
            <x-form.input name="username" :value="old('username', $user->username)" />
            <x-form.input name="email" :value="old('email', $user->email)" />

            <div class="mb-8">
                <input type="hidden" name="isAdmin" value="0">
                <input type="checkbox" id="isAdmin" name="isAdmin"  value="1"  @if($user->isAdmin) checked  @endif>
                <label for="isAdmin">
                    Admin
                </label><br>
            </div>
            <x-form.button>Update</x-form.button>


        </form>
    </x-setting>
</x-layout>
{{-- value="{{ old('isAdmin') }}" --}}
