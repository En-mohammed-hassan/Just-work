

<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="/images/icone.png" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#483d8b",
                            hover: "#9400d3"
                        },
                    },
                },
            };
        </script>
         <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <title>JUSTWORK | Find web Jobs & Projects</title>
    </head>
    <body>             <x-flash-message />

        <nav class="flex justify-between items-center  h-16 align-content-center">
            <div class="flex items-center">

            <a href="/"
                ><img class="w-24 ml-3" src="/images/logo.png" alt="" class="logo"

            /></a>
            @auth

            <p class=" hidden md:block inline font-bold text-xl cursor-not-allowed"> Welcome {{auth()->user()->name}}</p>
            @endauth

            </div>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth

                <li>
                    <a href="/listing/manage" class="hover:text-laravel font-bold"
                        ><i class="fa-solid fa-gear text-xl  transition duration-700 ease-in-out"></i> manage posts</a
                    >
                </li>


                <form action="/user/logout" method="POST" class="hover:text-laravel">
                    <button class="font-bold">
                        <i class="fa-solid fa-door-closed  text-xl  transition duration-700 ease-in-out"></i> logout
                    </button>

                </a>
                @csrf
                </form>
                @else
                <li>
                    <a href="/user/create" class="hover:text-laravel"
                        ><i class="fa-solid fa-door-closed text-xl  transition duration-700 ease-in-out"></i> register</a
                    >
                </li>
                <li>
                    <a href="/user/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket text-xl  transition duration-700 ease-in-out"></i>
                        Login</a
                    >
                </li>
                @endauth

            </ul>
        </nav>
        <main class="mb-20">
            @yield("content")

        </main>


        <footer
        class="fixed bottom-0 left-0 w-full flex items-center flex-col-reverse font-bold bg-laravel text-white h-24 md:h-16 md:flex-row opacity-90 md:justify-between">
        <p class=" p-2 md:m-4">Copyright &copy; 2024, All Rights reserved</p>

        <a
            href="/listing/create"
            class="  bg-black text-white md:m-4 p-2  w-24 rounded text-center"
            >Post Job</a
        >
    </footer>
</body>
</html>
