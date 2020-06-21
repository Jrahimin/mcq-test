<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamPacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_packs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('mini_test_count')->default(0);
            $table->integer('review_test_count')->default(0);
            $table->integer('model_test_count')->default(0);
            $table->double('price',10,2);
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
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
        Schema::dropIfExists('exam_packs');
    }
}
