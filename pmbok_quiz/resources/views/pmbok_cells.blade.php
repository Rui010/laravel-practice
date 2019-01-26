@extends('layouts.app')
@section('content')

<?php 
// phpinfo();

$list_pm_process_group = array(
    "立上げプロセス群", "計画プロセス群", "実行プロセス群", "監視・コントロール・プロセス群", "終結プロセス群");
$list_knowledge_area = array(
    "プロジェクト統合マネジメント","プロジェクト・スコープ・マネジメント","プロジェクト・スケジュール・マネジメント",
    "プロジェクト・コスト・マネジメント","プロジェクト品質マネジメント","プロジェクト資源マネジメント",
    "プロジェクト・コミュニケーション・マネジメント","プロジェクト・ステークホルダー・マネジメント",
    "プロジェクト・リスク・マネジメント","プロジェクト調達マネジメント");
$pmbok_table = array();
for($i = 0; $i < count($pmbok_cells); $i++) {
    $knowledge_area = $pmbok_cells[$i]->knowledge_area;
    $pm_process_group = $pmbok_cells[$i]->pm_process_group;
    $no = $pmbok_cells[$i]->no;
    $process = $pmbok_cells[$i]->process;
    if (array_key_exists($knowledge_area,$pmbok_table)) {
        if (array_key_exists($pm_process_group,$pmbok_table[$knowledge_area])) {
            $pmbok_table[$knowledge_area][$pm_process_group] .= "," . $process;
        } else {
            $pmbok_table[$knowledge_area] += array($pm_process_group=>$process);
        }
    } else {
        $pmbok_table += array($knowledge_area=>array());
        $pmbok_table[$knowledge_area] = array($pm_process_group=>$process);
    }
}
// var_dump($pmbok_table);

function get_process($knowledge_area, $pm_process_group,$pmbok_table) {
    $process = "";
    if (array_key_exists($knowledge_area,$pmbok_table)) {
        if (array_key_exists($pm_process_group,$pmbok_table[$knowledge_area])) {
            $process = $pmbok_table[$knowledge_area][$pm_process_group];
        }
    }
    return $process;
}

function process_split($process) {
    $ret = "";
    $arr = explode(",", $process);
    if (empty($process)) {
        return $ret;
    } 
    for ($i = 0; $i < count($arr); $i++) {
        $ret .= '<span>'.$arr[$i].'</span>';
    }
    return $ret;
}
?>
<style>

</style>

<table class="table table-striped tbl-r05">
<tr class="thead">
<th>知識エリア＼PMプロセス群</th>
@foreach($list_pm_process_group as $l)
<th>{{$l}}</th>
@endforeach
</tr>
@foreach($list_knowledge_area as $l)
<tr>
<td>{{$l}}</th>
<?php for($i = 0; $i < 5; $i++): ?>
<td data-label="<? echo $list_pm_process_group[$i];?>">
    <? echo process_split(get_process($l, $list_pm_process_group[$i],$pmbok_table)) ?>
</td>
<?php endfor; ?>
</tr>
@endforeach
</table>

@if (count($pmbok_cells) > 0)
<div class="panel panel-defalut">
    <div class="panel-heading">PMBOKの全体像</div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                
                <th>id</th>
                <th>知識エリア</th>
                <th>PMプロセス群</th>
                <th>No</th>
                <th>プロセス</th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
                @foreach ($pmbok_cells as $cell)
                <tr>
                    <td data-label="id" class="table-text">{{ $cell->id }}</td>   
                    <td data-label="知識エリア" class="table-text">{{ $cell->knowledge_area }}</td>                    
                    <td data-label="PMプロセス群" class="table-text">{{ $cell->pm_process_group }}</td>                    
                    <td data-label="No" class="table-text">{{ $cell->no }}</td>                    
                    <td data-label="プロセス" class="table-text">{{ $cell->process }}</td>
                    <td data-label="" class="table-text">
                        <form action="{{ url('cell/'.$cell->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> 削除</button>
                        </form>
                    </td>               
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
                <!-- <input type="text" name="knowledge_area" id="knowledge_area" class="form-control"> -->
                <select name="knowledge_area" id="knowledge_area" class="form-control">
                    <option value="プロジェクト統合マネジメント">プロジェクト統合マネジメント</option>
                    <option value="プロジェクト・スコープ・マネジメント">プロジェクト・スコープ・マネジメント</option>
                    <option value="プロジェクト・スケジュール・マネジメント">プロジェクト・スケジュール・マネジメント</option>
                    <option value="プロジェクト・コスト・マネジメント">プロジェクト・コスト・マネジメント</option>
                    <option value="プロジェクト品質マネジメント">プロジェクト品質マネジメント</option>
                    <option value="プロジェクト資源マネジメント">プロジェクト資源マネジメント</option>
                    <option value="プロジェクト・コミュニケーション・マネジメント">プロジェクト・コミュニケーション・マネジメント</option>
                    <option value="プロジェクト・ステークホルダー・マネジメント">プロジェクト・ステークホルダー・マネジメント</option>
                    <option value="プロジェクト・リスク・マネジメント">プロジェクト・リスク・マネジメント</option>
                    <option value="プロジェクト調達マネジメント">プロジェクト調達マネジメント</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="pm_process_group" class="col-sm-3 control-label">プロジェクトマネジメントプロセス群</label>
            <div class="col-sm-6">
                <!-- <input type="text" name="pm_process_group" id="pm_process_group" class="form-control"> -->
                <select name="pm_process_group" id="pm_process_group" class="form-control">
                    <option value="立上げプロセス群">立上げプロセス群</option>
                    <option value="計画プロセス群">計画プロセス群</option>
                    <option value="実行プロセス群">実行プロセス群</option>
                    <option value="監視・コントロール・プロセス群">監視・コントロール・プロセス群</option>
                    <option value="終結プロセス群">終結プロセス群</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="no" class="col-sm-3 control-label">連番</label>
            <div class="col-sm-6">
                <input type="number" name="no" id="no" class="form-control" value="1">
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
                <button type="submit" class="btn btn-default" name="create"><i class="fas fa-plus"></i> 追加</button>
            </div>
        </div>
    </form>
    <hr>
    @include('common.errors')    
    <form action="/cell" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="no" class="col-sm-3 control-label">ID</label>
            <div class="col-sm-6">
                <input type="number" name="id" id="id" class="form-control" value="1">
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
                <button type="submit" class="btn btn-default" name="update"><i class="fas fa-sync-alt"></i> 更新</button>
            </div>
        </div>
    </form>
</div>

@endsection