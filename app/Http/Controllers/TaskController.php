<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    //get all tasks
    public function getAllTask()
    {

        return response()->json(Task::all(), 200);
    }

    //get task details by id
    public function getTaskById($id)
    {

        $task = Task::find($id);

        //if not found task
        if (is_null($task)) {

            return response()->json(['message' => 'Task Not Found'], 404);
        }

        //if task found
        return response()->json($task::find($id), 200);
    }

    //add new task
    public function addTask(Request $request)
    {

        $task = Task::create($request->all());

        return response()->json($task, 201);
    }

    //update task
    public function updateTask(Request $request, $id)
    {

        $task = Task::find($id);

        //if not found
        if (is_null($task)) {
            return response()->json(['message' => 'Task Not Found'], 404);
        }

        //if found task
        $task->update($request->all());

        //return
        return response()->json($task, 201);
    }

    //delete task
    public function deleteTask(Request $request, $id)
    {

        $task = Task::find($id);

        //if not found
        if (is_null($task)) {
            return response()->json(['message' => 'Task Not Found'], 404);
        }

        //if found task
        $task->delete();

        //return
        return response()->json(null, 204);
    }
}
