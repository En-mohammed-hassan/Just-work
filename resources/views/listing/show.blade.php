@extends("layouts.layout")
@section("content")
@include("partials._search")


<div>

        <div class="flex justify-between ">
             <a href="/" class="inline-block text-black ml-4 text-xl mb-4 hover:text-laravel"><i class="transition duration-700 ease-in-out fa-solid fa-arrow-left"></i> Back
             </a>

        </div>


</div>

<div class="mx-4 ">
<div class="bg-gray-50 border border-gray-200 p-10 rounded">

    <div class="flex truncate  ">

        <img
            class="w-[150px] mr-6 mb-6 hidden md:block"
            src="{{$list->logo ? asset("/storage/".$list->logo) : asset("images/logo.png")}}"            alt=""
        />
        <div>
<div>
    <h3 class="text-xl font-bold m-5 inline"> Job title      : </h3><p class="inline text-lg  text-gray-400">{{$list->title}}</p>

</div>
<div>
    <h3 class="text-xl font-bold m-5 inline">Company : </h3><p class="inline text-lg  text-gray-400">{{$list->company}}</p>

</div>
<div>
    <h3 class="text-xl font-bold m-5 inline">Location   : </h3><p class="inline text-lg  text-gray-400">{{$list->company}}</p>

</div>

            <div class="m-5">
                <x-list-tags-anchor :tagscsv="$list->tags"/>


            </div>


        </div>
    </div>



        <div class="border border-gray-200 w-full mb-6"></div>
        <div>
            <div
            class="flex flex-col items-center justify-center text-center"
        >
            <h3 class="text-3xl font-bold mb-4">
                Job Description
            </h3>
            <div class="text-lg space-y-6">

                {{$list->description}}
                <a
                    href="{{$list->email}}"
                    class="block bg-laravel m-auto text-white mt-6 py-2 rounded-xl  w-[300px] xl:w-[600px]  lg:w-[450px]  hover:opacity-80"
                    ><i class="fa-solid fa-envelope"></i>
                    Contact Employer</a
                >

                <a
                    href="{{$list->website}}"
                    target="_blank"
                    class="block bg-black text-white m-auto  py-2 w-[300px] xl:w-[600px]  lg:w-[450px]  rounded-xl hover:opacity-80"
                    ><i class="fa-solid fa-globe"></i> Visit
                    Website</a
                >
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
