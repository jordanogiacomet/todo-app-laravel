<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    

    public function editTodo(Request $request, Todo $todo){
        $incomingFields = $request->validate([
            'text-edit' => 'required'
        ]);

        $incomingFields['text-edit'] = strip_tags($incomingFields['text-edit']);

        if(auth()->user()->id === $todo['user_id']){
            $todo->update(['text' => $incomingFields['text-edit']]);
            session()->flash('message.level', 'success');
            session()->flash('message.content', 'Todo atualizado com sucesso');
        }
    
    
        return redirect('/home');
    }


    public function completeTodo(Todo $todo){
        if(auth()->user()->id === $todo['user_id']){
           $todo->update(['completed' => '1']);
        
           session()->flash('message.level', 'success');
           session()->flash('message.content', 'Todo completado com sucesso');
        }
    }


    public function deleteTodo(Todo $todo){
        if(auth()->user()->id === $todo['user_id']){
            $todo->delete();

            session()->flash('message.level', 'success');
            session()->flash('message.content', 'Todo removido com sucesso');
        }

        return redirect('/home');
    }

 

    public function createTodo(Request $request){
       
        $incomingFields = $request->validate([
            'text' => 'required'
        ]);

        $incomingFields['text'] = strip_tags($incomingFields['text']);
        $incomingFields['user_id'] = auth()->id();


        if(Todo::create($incomingFields)){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Todo foi adicionado com sucesso');
        }
        return redirect('/home');
    }
}
