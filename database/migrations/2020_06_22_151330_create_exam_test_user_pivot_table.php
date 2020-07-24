<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamTestUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_test_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('exam_test_id');
            $table->unsignedInteger('user_id');
            $table->double('score')->default(0);
            $table->integer('total_correct')->default(0);
            $table->integer('total_wrong')->default(0);
            $table->double('enrolment_price', 8, 2)->nullable();
            $table->dateTime('enrolment_date')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 : not participated. 1 : participated');
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
        Schema::dropIfExists('exam_test_user');
    }
}
