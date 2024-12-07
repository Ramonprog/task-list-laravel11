<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {}
}


$tasks = [
  new Task(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Task(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Task(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Task(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];

Route::get('/', function () use($tasks) {
    return redirect()->route('tasks.index');
});

// Rotas da aplicação
Route::get('/tasks', function () use($tasks) {
    if (is_null($tasks)) {
        $tasks = []; // Inicializa como um array vazio se for null
    }

    return view('index', ['tasks' => $tasks]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) use($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);

    if(!$task) {
        abort(Response::HTTP_NOT_FOUND, 'Task not found');
    }

    return view('show', ['task' => $task]);
})->name('tasks.show');


// Route::get('/hello', function () {
//     return 'Hello world!';  
// });

// //O parâmetro {name} é passado para a função

// Route::get('/greet/{name}', function ($name) {
//     return 'Good morning ' . $name . '!';
// });

// Route::get('/redirect', function () {
//     return redirect('/hello');
// });


// Route::get('/showNumber/{number}', function($number) {
//     if (!is_numeric($number)) {
//         return 'The number is not numeric';
//     }
//     return 'The number is ' . $number;
// });

// //Nomeando a rota
// Route::get('/namedRoute', function () {
//     return 'This is a named route';
// })->name('namedRoute');

// //redirecionando para rota nomeada

// Route::get('/redirectToNamedRoute', function () {
//     return redirect()->route('namedRoute');
// });

// // rota de fallback (quando não encontrar uma rota correspondente) not found
// Route::fallback(function () {
//     return 'This is a fallback route';
// });