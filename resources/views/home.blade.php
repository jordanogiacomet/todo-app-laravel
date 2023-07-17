@extends('layout')

@section('content')
@auth
<div class="z-0">
    <div>
        <h3 class="text-center text-4xl my-8">Todo List:</h3>
    </div>
    <div class="w-full overflow-x-auto z-10">
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
                                <div>
                                    <button class="bg-yellow-600 rounded-2xl p-2 text-white" id="{{$todo->id}}" onclick="showEditScreen(this)">Editar</button>
                                </div>
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
        <button class="bg-blue-600 h-10 rounded-2xl px-4 text-white">Adicionar</button>
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
@foreach ($todos as $todo)
    <div class="bg-gray-200 w-6/12 absolute -z-1 modal top-1/3 right-1/4 hidden" id="{{$todo->id}}">
        <form action="/editar/{{$todo->id}}" method="POST" class="flex flex-col items-center p-5 gap-5 m-0">
            @csrf
            @method('PUT')
            <input type="text" class="h-16 placeholder:text-gray-300 text-center" placeholder="Escreva sua tarefa" name="text-edit">
            <button class="bg-blue-600 rounded-2xl p-2 text-white">Enviar</button>
        </form>
    </div>
@endforeach
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
@endsection
