@props(["list"])
<a class="" href="listing/@php echo $list->id; @endphp">

<x-card >
    @php
    $time=now()->diffInMinutes($list->created_at);
   $type= $time <60 ? "Min"  : ($time < 1440  ? "Hours" : "Days");
   $count= $time <60 ? $time  : ($time < 1440  ? now()->diffInHours($list->created_at) : now()->diffInDays($list->created_at));
    @endphp




    <div>

    <h3   h3 class="text-xl font-bold truncate">
    {{$list->title}}
    </h3>
    <h2 class="text-xs text-gray-500 "> <i class="fa-solid fa-clock"></i> {{$count}} {{$type}}  Ago</h2>
    <div class="flex m-5">

        <img
            class="hidden w-16 h-16  mr-6 md:block"
            src="{{$list->logo ? asset("/storage/".$list->logo) : asset("images/logo.png")}}"
            alt=""
        />
        <div class=" truncate">

            <div class="text-lg  mb-4"> {{$list->company}}</div>
       <x-list-tags :tagscsv="$list->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$list->location}}
            </div>
        </div>
    </div>
    </div>
</x-card>
</a>

