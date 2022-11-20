@if (session()->has('success'))
<div x-data="{show: true}"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
class="fixed bg-blue-500 px-4 py-2 text-white rounded-xl bottom-3 right-3 text-sm ">
    <p>
        {{session('success')}}
    </p>
</div>
@endif
@if (session()->has('error'))
<div x-data="{show: true}"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
class="fixed bg-red-500 px-8 py-6 text-white rounded-xl top-3 right-1/2 text-sm ">
    <p>
        {{session('error')}}
    </p>
</div>
@endif
