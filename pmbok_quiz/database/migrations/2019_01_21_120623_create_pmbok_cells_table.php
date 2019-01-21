<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePmbokCellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pmbok_cells', function (Blueprint $table) {
            $table->increments('id');
            $table->string('knowledge_area');
            $table->string('pm_process_group');
            $table->integer('no');
            $table->string('process');
            $table->timestamps();
            $table->unique(['knowledge_area','pm_process_group','no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pmbok_cells');
    }
}
