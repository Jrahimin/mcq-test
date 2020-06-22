<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamPackUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_pack_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('exam_pack_id');
            $table->unsignedInteger('user_id');
            $table->double('enrolment_price',10,2);
            $table->dateTime('enrolment_date');
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
        Schema::dropIfExists('exam_pack_user');
    }
}
