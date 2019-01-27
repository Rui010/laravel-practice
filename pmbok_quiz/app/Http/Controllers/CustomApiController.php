<?php

namespace App\Http\Controllers;

use App\Pmbok_cell;
use Illuminate\Http\Request;
use App\Http\Pmbok_Cell_Controller;

class CustomApiController extends Controller
{
    public function index()
    {
        $pmbok_cells = Pmbok_cell::orderBy('id', 'asc')->get();
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
        return response()->json($pmbok_table);
    }

}
