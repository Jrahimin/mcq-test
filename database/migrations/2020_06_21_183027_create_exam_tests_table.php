<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('exam_pack_id')->index();
            $table->string('title');
            $table->dateTime('exam_schedule');
            $table->integer('duration_minutes')->nullable();
            $table->double('price',8,2);
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
        Schema::dropIfExists('exam_tests');
    }
}
