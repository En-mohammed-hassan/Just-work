@extends("layouts.layout")
@section("content")
@include("partials._search")

<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage posts
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @foreach ($listings as $list)
                <tr class="border-gray-300 ">
                    <td class="px-2 py-8 border-t border-b border-gray-300 text-lg  }}">
                        <a class="w-[120px] md:w-[350px] truncate block" href="/listing/{{$list->id}}">
                            {{$list->title}}
                        </a>
                    </td>
                    <td class="px-2 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/listing/{{$list->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                            Edit</a>
                    </td>
                    <td class="px-2 py-8 border-t border-b border-gray-300 text-lg">
                        <form action="/listing/{{$list->id}}" method="post">
                            @csrf
                            @method("delete")
                            <button class="text-red-600">
                                <i class="fa-solid fa-trash-can"></i>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>


                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
