<?php

namespace App\Http\Controllers;
use App\Models\TaskRepository;
use Illuminate\Auth\Middleware\Authenticate;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    protected TaskRepository $tasks;
    public function __construct(TaskRepository $tasks)
    {

        $this->middleware('auth');

        $this -> tasks = $tasks;
    }

    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name
        ]);

        return redirect('/tasks');
    }

    public function show(Request $request, Task $task)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function destroy(Request $request, Task $task)
    {
        $task->delete();

        return redirect('/tasks');
    }
}
