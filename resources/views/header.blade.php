<header class="p-10 flex justify-between bg-gray-900">
    <h1 class="text-gray-400">Todo list</h1>
   
    @auth
        <form class="m-0" action="/logout" method="POST">
            @csrf
            <button class="text-gray-400">Logout</button>
        </form>
    @else
        <form class="m-0" action="/login-page" method="GET">
            @csrf
            <button class="text-gray-400">Login</button>
        </form>
    @endauth   
</header>