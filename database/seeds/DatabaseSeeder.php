<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(AnswerSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
