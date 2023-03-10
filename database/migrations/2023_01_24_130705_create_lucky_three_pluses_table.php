<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuckyThreePlusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lucky_three_pluses', function (Blueprint $table) {
            $table->id();
            $table->string('draw_id', 15);
            $table->string('draw_title', 60);
            $table->date('draw_date');
            $table->time('draw_time');
            $table->string('draw_result', 60);
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lucky_three_pluses');
    }
}
