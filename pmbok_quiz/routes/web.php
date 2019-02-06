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
use App\Pmbok_cell;
use App\score;
use Illuminate\Http\Request;
use App\Http\Pmbok_Cell_Controller;
// use Illuminate\Support\Facade\Auth;

//　PMBOKの表
Route::get('/', function () {
    $pmbok_cells = Pmbok_cell::orderBy('id', 'asc')->get();
    $user = Auth::user();
    if (isset($user)) {
        $score = score::where('user_id', $user->id)->get();
    } else {
        $score = [];
    }
    return view('pmbok_table', [
        'pmbok_cells' => $pmbok_cells,
        'user' => $user,
        'score'=>$score,
    ]);
});

// PMBOKのクイズ
Route::get('/quiz', function() {
    $pmbok_cells = Pmbok_cell::orderBy('id', 'asc')->get();
    $user = Auth::user();

    return view('pmbok_quiz', [
        'pmbok_cells' => $pmbok_cells,
        'user' => $user
    ]);
});

// 全PMBOKの一覧と追加・編集フォーム
Route::get('/admin', function () {
    // $pmbok_cells = Pmbok_cell::orderBy('id', 'asc')->get();
    $pmbok_cells = Pmbok_cell::orderBy('id', 'asc')->paginate(7);
    $user = Auth::user();

    return view('pmbok_cells', [
        'pmbok_cells' => $pmbok_cells,
        'user' => $user
    ]);
})->middleware('auth');

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

// PMBOKのプロセスを追加
Route::post('/cell', 'Pmbok_Cell_Controller@postAction');
Route::put('/cell', 'Pmbok_Cell_Controller@putAction');

Route::delete('/cell/{cell}', function (pmbok_cell $pmbok_cell) {
    $pmbok_cell->delete();
    return redirect('/');
});

Route::put('/cell/{cell}', 'Pmbok_Cell_Controller@putDuplicationFlag');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
