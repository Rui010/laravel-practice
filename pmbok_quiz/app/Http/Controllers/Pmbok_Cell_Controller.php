<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Pmbok_cell;

class Pmbok_Cell_Controller extends Controller
{
    public function postAction(Request $request) {
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
        $pmbok_cell->duplication_flag = $request->duplication_flag;
        $pmbok_cell->save();
    
        return redirect('/');
    }

    public function putAction(Request $request) {
        $pmbok_cell = pmbok_cell::where('id', $request->id)->first();
        $pmbok_cell->process = $request->process;
        $pmbok_cell->duplication_flag = $request->duplication_flag;
        $pmbok_cell->save();
    
        return redirect('/');
    }

    public function putDuplicationFlag(Request $request, $id ,pmbok_cell $pmbok_cell) {
        $pmbok_cell = pmbok_cell::where('id', $id)->first();
        if ($pmbok_cell->duplication_flag) {
            $pmbok_cell->duplication_flag = '';
        } else {
            $pmbok_cell->duplication_flag = '1';
        }
        
        $pmbok_cell->save();
    
        return redirect('/admin');
    }
}
