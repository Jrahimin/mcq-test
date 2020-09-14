<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128)->nullable();
            $table->string('mobile_no', 16)->nullable();
            $table->string('email', 64);
            $table->string('title', 128);
            $table->boolean('is_read')->default(false);
            $table->boolean('is_replied')->default(false);
            $table->unsignedBigInteger('reply_mail_id')->nullable();
            $table->text('message');
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
        Schema::dropIfExists('feedback');
    }
}
