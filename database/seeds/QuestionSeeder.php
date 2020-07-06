<?php

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        factory(Question::class, 10)->create();
    }
}
