@extends("layouts.layout")
@section("content")
@include("partials._hero")
@include("partials._search")
<div
class="grid lg:grid-cols-3 md:grid-cols-2 gap-4 space-y-4 md:space-y-2 mx-10 "
>
@foreach ($listings as $list)
<x-list :list="$list" />
@endforeach
</div>
<div class="mt-6 p-4">
    {{$listings->links()}}
</div>
@endsection
