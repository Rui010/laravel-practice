@extends('layouts.app')
@section('content')

@if (count($pmbok_cells) > 0)
<div class="panel panel-defalut">
    <div class="panel-heading">PMBOKの全体像</div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <th>知識エリア</th>
                <th>PMプロセス群</th>
                <th>No</th>
                <th>プロセス</th>
            </thead>
            <tbody>
                @foreach ($pmbok_cells as $cell)
                <tr>
                    <td class="table-text">{{ $cell->knowledge_area }}</td>                    
                    <td class="table-text">{{ $cell->pm_process_group }}</td>                    
                    <td class="table-text">{{ $cell->no }}</td>                    
                    <td class="table-text">{{ $cell->process }}</td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

<div class="panel-body">
    @include('common.errors')    
    <form action="/cell" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="knowledge_area" class="col-sm-3 control-label">知識エリア</label>
            <div class="col-sm-6">
                <input type="text" name="knowledge_area" id="knowledge_area" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="pm_process_group" class="col-sm-3 control-label">プロジェクトマネジメントプロセス群</label>
            <div class="col-sm-6">
                <input type="text" name="pm_process_group" id="pm_process_group" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="no" class="col-sm-3 control-label">連番</label>
            <div class="col-sm-6">
                <input type="text" name="no" id="no" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="process" class="col-sm-3 control-label">項目</label>
            <div class="col-sm-6">
                <input type="text" name="process" id="process" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default"><i class="fa fa-plus"></i> 追加</button>
            </div>
        </div>
    </form>

</div>

@endsection