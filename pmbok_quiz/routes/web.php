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

// 全PMBOKの知識エリアとPMプロセス群を表示
Route::get('/', function () {
    $pmbok_cells = Pmbok_cell::orderBy('id', 'asc')->get();

    return view('pmbok_cells', [
        'pmbok_cells' => $pmbok_cells
    ]);
});

// PMBOKのプロセスを追加
Route::post('/cell', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'knowledge_area'=>'required',
        'pm_process_group'=>'required',
        'no'=>'required',
        'process'=>'required',
    ]);
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $pmbok_cell = new pmbok_cell;
    $pmbok_cell->knowledge_area = $request->knowledge_area;
    $pmbok_cell->pm_process_group = $request->pm_process_group;
    $pmbok_cell->no = $request->no;
    $pmbok_cell->process = $request->process;
    $pmbok_cell->save();

    return redirect('/');
});

// PMBOKのクイズ
Route::get('quiz', function() {
    //
});