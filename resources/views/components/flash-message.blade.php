@if (session("message"))

<div x-show="show" x-data="{show:true}" x-init="setTimeout(()=> show=false,3000)" class=" rounded w-[500px] fixed top-0 left-1/2 trasform -translate-x-1/2 opacity-60 bg-laravel text-white p-4 ">
    <p class="text-center">
        {{session("message")}}
    </p>
</div>
@endif

