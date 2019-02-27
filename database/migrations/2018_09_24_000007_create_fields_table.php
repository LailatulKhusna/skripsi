<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('session_id');
            $table->unsignedInteger('field_list_id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('field_list_id')->references('id')->on('field_lists')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}
