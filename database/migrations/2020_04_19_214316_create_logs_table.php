<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('Requested_server');
            $table->text('primary_port');
            $table->text('client_ip');
            $table->text('local_port');
            $table->text('scheme');
            $table->text('content_type');
            $table->text('traf_cont');
            $table->integer('count');
            $table->text('dt');
            $table->text('expected_block_time');
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
        Schema::dropIfExists('logs');
    }
}
