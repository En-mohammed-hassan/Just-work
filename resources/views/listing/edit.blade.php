@extends("layouts.layout")
@section("content")
                <div
                    class="bg-gray-50 border border-gray-200 p-10  rounded max-w-lg mx-auto mt-24"
                >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Edit your post
                        </h2>
                    </header>

                    <form method="POST" action="/listing/{{$list->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="mb-6">
                            <label
                                for="title"
                                class="inline-block text-lg mb-2"
                                >Title</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                value="{{$list->title}}"
                            />
                            @error("title")
                            <P class="text-red-500 text-xs mt-1">{{$message}}</P>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label
                                for="company"
                                class="inline-block text-lg mb-2"
                                >Company Name</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="company"
                                value="{{$list->company}}"
                            />
                            @error("company")
                            <P class="text-red-500 text-xs mt-1">{{$message}}</P>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Job Title</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                placeholder="Example: Senior Laravel Developer"
                                value="{{$list->title}}"

                            />
                            @error("title")
                            <P class="text-red-500 text-xs mt-1">{{$message}}</P>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="location"
                                class="inline-block text-lg mb-2"
                                >Job Location</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="location"
                                placeholder="Example: Remote, Damascus , etc"
                                value="{{$list->location}}"

                            />
                            @error("location")
                            <P class="text-red-500 text-xs mt-1">{{$message}}</P>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Contact Email</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                                value="{{$list->email}}"

                            />
                            @error("email")
                            <P class="text-red-500 text-xs mt-1">{{$message}}</P>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="website"
                                class="inline-block text-lg mb-2"
                            >
                                Website/Application URL
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="website"
                                value="{{$list->website}}"

                            />
                            @error("website")
                            <P class="text-red-500 text-xs mt-1">{{$message}}</P>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="tags" class="inline-block text-lg mb-2">
                                Tags (Comma Separated)
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="tags"
                                placeholder="Example: Laravel, Backend, Postgres, etc"
                                value="{{$list->tags}}"


                            />
                            @error("tags")
                            <P class="text-red-500 text-xs mt-1">{{$message}}</P>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">
                                Company Logo
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="logo"

                            />
                            @error("logo")
                            <P class="text-red-500 text-xs mt-1">{{$message}}</P>
                            @enderror
                            <img
            class="w-48 mr-6 mb-6"
            src="{{$list->logo ? asset("/storage/".$list->logo) : asset("images/no-image.png")}}"            alt=""
        />
                           </div>

                        <div class="mb-6">
                            <label
                                for="description"
                                class="inline-block text-lg mb-2"
                            >
                                Job Description
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="Include tasks, requirements, salary, etc"
                            >{{$list->description}}</textarea>
                            @error("description")
                            <P class="text-red-500 text-xs mt-1">{{$message}}</P>
                            @enderror
                        </div>

                        <div class="mb-6 ">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:opacity-80 transition duration-700 ease-in-out"
                            >
                                Edit
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </div>
@endsection
