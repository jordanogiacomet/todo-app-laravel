<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/home.js')}}"></script>
    <title>Document</title>
</head>
<body class="xl:container xl:mx-auto">
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

    @auth
        <div>
            <h3 class="text-center text-4xl my-8">Todo List:</h3>
        </div>
        <div class="w-full overflow-x-auto">
            <table class="min-w-full bg-white mx-auto">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-center">ID</th>
                        <th class="py-2 px-4 border-b text-center">Descrição</th>
                        <th class="py-2 px-4 border-b">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos as $todo)
                        <tr class="@if($todo->completed)completed @endif">
                            <td class="py-2 px-4 border-b text-center">{{$todo['user_id']}}</td>
                            <td class="py-2 px-4 border-b text-center">{{$todo['text']}}</td>
                            <td class="py-2 px-4 border-b">
                                <div class="flex gap-2 justify-center">
                                    <form method="POST" action="/remover/{{$todo->id}}" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-600 rounded-2xl p-2 text-white">Remover</button>
                                    </form>
                                    <form method="POST" action="/completar/{{$todo->id}}" class="m-0" onsubmit="return markAsCompleted(this, event)">
                                        @csrf
                                        @method('PUT')
                                        <button class="bg-gray-600 rounded-2xl p-2 text-white">Completar</button>
                                    </form>
                                    <form method="GET" action="/json/{{$todo->id}}" class="m-0">
                                        @csrf
                                        <button class="bg-blue-600 rounded-2xl p-2 text-white">ToJson</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            {{$todos->links()}}
            <form action="/adicionar" method="POST" class="my-8 flex flex-row gap-3 justify-center">
                @csrf
                <input type="text" placeholder="Escreva uma tarefa" class="h-10 border-2 rounded-lg placeholder:text-gray-500 pl-[14px]" name="text">
                <button class="bg-blue-600 h-10 rounded-2xl px-4 text-white" >Adicionar</button>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-600 text-center">{{ $error }}</li>
                         @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('message.level'))
                <p class="text-green-600 text-center">{{session('message.content')}}</p>
            @endif
       </div>
    @else
        <div class="flex flex-col items-center">
            <form class="flex flex-col items-start gap-4" action="/register" method="POST">
                @csrf
                <h2 class="text-center text-4xl my-8">Registro</h2>
                <input class="h-10 border-2 rounded-lg placeholder:text-gray-500 pl-[14px]" placeholder="username" type="text" name="name" required>
                <input class="h-10 border-2 rounded-lg placeholder:text-gray-500 pl-[14px]" placeholder="email" type="text" name="email" required>
                <input class="h-10 border-2 rounded-lg placeholder:text-gray-500 pl-[14px]" placeholder="password" type="password" name="password" required>
                <button class="h-10 bg-blue-600 rounded-2xl px-4 text-white self-end">Registrar</button>
            </form>
        </div>
    @endauth
</body>
</html>