<?php

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

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('home.index');
});



Route::resource('contacts', 'ContactsController');

/*
 * don't work
 * Route::post('contacts', 'ContactsController@store');
 *
 */


/*Route::get('user/profile', [
    'as' => 'profile', 'uses' => 'UserController@showProfile'
]);*/


/*//получаем модель
Route::get('/tasks/{id}', function($id){
   return json_encode(Task::find($id));
});

//изменяем модель
Route::put('/tasks/{id}', function($id){
    $input = Input::json();

    $task = Task::find($id);
    $task->title = $input->get('title');
    $task->complete = $input->get('complete');
    $task->save();
});

//удаляем модель
Route::delete('/tasks/{id}', function($id){
    Task::find($id)->delete();
});

//создаем новую модель
Route::post('/tasks', function(){
    $input = Input::json();

    $task = new Task();
    $task->title = $input->get('title');
    $task->complete = $input->get('complete');
    $task->save();

    return json_encode($taskArr = [
        'id' => $task->id,
        'title' => $input->get('title'),
        'complete' => $input->get('complete')
    ]);
});

//заполнение коллекции
Route::get('/tasks', function(){
    $tasks = Task::all();
    $taskCollection = [];
    foreach ($tasks as $model){
        $taskCollection[] =$model->attributesToArray();
    }

    return json_encode($taskCollection);

});*/