<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXssRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xss_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('msg');
            $table->text('content');
           // $table->text('cs');
            $table->text('ref');
            $table->text('class_type');
            $table->text('sid');
            $table->text('rev');
            $table->text('meta_data');
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
        Schema::dropIfExists('xss_roles');
    }
}
