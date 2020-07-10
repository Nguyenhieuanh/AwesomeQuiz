<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableQuizResultAddForeignKeyUserQuizIdReferenceIdOnTableUserQuiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quiz_results', function (Blueprint $table) {
            $table->unsignedBigInteger('user_quiz_id')->after('quiz_id')->nullable();
            $table->foreign('user_quiz_id')->references('id')->on('user_quizzes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quiz_results', function (Blueprint $table) {
            //
        });
    }
}
