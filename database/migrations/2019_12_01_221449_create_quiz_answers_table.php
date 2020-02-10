<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBiginteger('quiz_id');
            $table->unsignedBigInteger('question_id');
            $table->string('question');
            $table->unsignedBigInteger('answer_id');
            $table->string('answer');
            $table->integer('is_correct');
            $table->string('correct_answer');
            $table->timestamps();


            $table->foreign('quiz_id')->references('id')->on('student_quizzes')->onDelete('cascade');

            // $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

            // $table->foreign('answer_id')->references('id')->on('question_answers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_answers');
    }
}
