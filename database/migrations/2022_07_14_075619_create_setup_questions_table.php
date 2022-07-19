<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('interview_id');
            $table->integer('candidate_id');
            $table->integer('question_id_1');
            $table->integer('question_id_2');
            $table->integer('question_id_3');
            $table->integer('question_id_4');
            $table->integer('question_id_5')->nullable()->change();
            $table->integer('question_id_6')->nullable()->change();
            $table->integer('question_id_7')->nullable()->change();
            $table->integer('question_id_8')->nullable()->change();
            $table->integer('question_id_9')->nullable()->change();
            $table->integer('question_id_10')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setup_questions');
    }
};
