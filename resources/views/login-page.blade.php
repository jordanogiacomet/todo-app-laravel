<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="xl:container xl:mx-auto">
    <header class="p-10 flex justify-between bg-gray-900">
        <h1 class="text-gray-400">Todo list</h1>
        <form class="m-0" action="/home" method="GET"><button class="text-gray-400">Registrar</button></form>
   </header>
        <div class="flex flex-col items-center">
            <form class="flex flex-col items-start gap-4" action="/login" method="POST">
                @csrf
                <h2 class="text-center text-4xl my-8">Login</h2>
                <input class="h-10 border-2 rounded-lg placeholder:text-gray-500 pl-[14px]" placeholder="username" type="text" name="login-name">
                <input class="h-10 border-2 rounded-lg placeholder:text-gray-500 pl-[14px]" placeholder="password" type="password" name="login-password">
                <button class="h-10 bg-blue-600 rounded-2xl px-4 text-white self-end my-3">Login</button>
            </form>
        </div>
    
</body>
</html>