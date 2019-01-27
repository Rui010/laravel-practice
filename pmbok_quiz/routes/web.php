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
use Illuminate\Http\Request;
use App\Http\Pmbok_Cell_Controller;

//　PMBOKの表
Route::get('/', function () {
    $pmbok_cells = Pmbok_cell::orderBy('id', 'asc')->get();

    return view('pmbok_table', [
        'pmbok_cells' => $pmbok_cells
    ]);
});

// 全PMBOKの一覧と追加・編集フォーム
Route::get('/admin', function () {
    // $pmbok_cells = Pmbok_cell::orderBy('id', 'asc')->get();
    $pmbok_cells = Pmbok_cell::orderBy('id', 'asc')->paginate(7);

    return view('pmbok_cells', [
        'pmbok_cells' => $pmbok_cells
    ]);
});

// PMBOKのプロセスを追加
Route::post('/cell', 'Pmbok_Cell_Controller@postAction');
Route::put('/cell', 'Pmbok_Cell_Controller@putAction');

Route::delete('/cell/{cell}', function (pmbok_cell $pmbok_cell) {
    $pmbok_cell->delete();
    return redirect('/');
});

// PMBOKのクイズ
Route::get('quiz', function() {
    //
    return redirect('/');
});