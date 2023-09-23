@if (session()->has('message'))

<div x-data="{show : true}" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="bg-orange-100 fixed m-2 bottom-0 right-0 z-20 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
    <p class="font-bold">Olives PH:</p>
    <p>{{session('message')}}</p>
</div>

@endif