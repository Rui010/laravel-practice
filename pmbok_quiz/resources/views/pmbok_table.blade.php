@extends('layouts.app')
@section('content')

<?php 
// phpinfo();
// echo $user;
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
@if (count($pmbok_cells) > 0)
<div class="panel panel-defalut">
    <div class="panel-heading">PMBOKの全体像</div>
    <div class="panel-body">
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
    </div>
</div>
@endif

@endsection