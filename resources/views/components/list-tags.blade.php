@props(["tagscsv"])


@php
    $tags= explode(",",$tagscsv);
@endphp
<ul class="flex">
    @foreach ($tags as $tag)

    <li>
        <p class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">{{$tag}}</p>
    </li>
    @endforeach

</ul>
