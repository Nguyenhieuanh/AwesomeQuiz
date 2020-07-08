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
        factory(Answer::class,1000)->create();
        // Schema::enableForeignKeyConstraints();
    }
}
