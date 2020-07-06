<?php

use App\Models\Answer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('answers')->truncate();
        $answers= [
            ['Dung', 1 , 1],
            ['Sai 1', 1 , 0],
            ['Sai 2', 1 , 0],
            ['Sai 3', 1 , 0],
            ['Sai 3', 2 , 0],
            ['Sai 4', 2 , 0],
            ['Sai 5', 2 , 0],
            ['Dung 2', 2 , 1],
        ];

        foreach ($answers as $key => $answer) {
            Answer::create([
                'answer_content' => $answer[0],
                'question_id' => $answer[1],
                'correct' => $answer[2],
            ]);
        }
        // Schema::enableForeignKeyConstraints();
    }
}
