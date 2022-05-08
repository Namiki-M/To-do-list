<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Throwable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use DateTime;


class TodosController extends Controller
{
    //

    public function index() {
        $todos = Todo::all();

        return view('todos.index', compact('todos'));
    }

    public function store(Request $request){
        
        try{
            DB::transaction(function () use($request){
                Todo::create([
                    'body' => $request->body,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime()
                ]);
            }, 2);
        }catch(Throwable $e){
            Log::error($e);
            throw $e;
        }

        return redirect()->route('todos.index');
    }

    public function delete($id){
        Todo::destroy($id);

        return redirect()->route('todos.index');
    }

    public function edit($id){
        $todo = Todo::findOrFail($id);
        // dd($todo);
        

        return view('todos.edit', compact('todo'));

    }

    public function update(Request $request, $id){
        $todo = Todo::findOrFail($id);

        $todo->body = $request->body;
        $todo->updated_at = new DateTime();

        $todo->save();

        return redirect()->route('todos.index');

    }

}
