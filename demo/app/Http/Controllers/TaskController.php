<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
   
    // Lista todas as tarefas
    public function index()
    {
        $tasks = Task::all();
        return response()->json(['data' => $tasks]);
    }

    // Cria uma nova tarefa
    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json(['data' => $task], 201);
    }

    // Exibe uma única tarefa
    public function show($id)
    {
        
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }
        return response()->json(['data' => $task]);
    }

    // Atualiza uma tarefa existente
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }
        $task->update($request->all());
        return response()->json(['data' => $task]);
    }

    // Exclui uma tarefa existente
    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }
        $task->delete();
        return response()->json(['message' => 'Tarefa excluída com sucesso']);
    }

    public function validaCpf($cpf)
    {
        require_once app_path('Helpers/Uteis.php');

        return json_encode(validateCpf($cpf));
    }
}
