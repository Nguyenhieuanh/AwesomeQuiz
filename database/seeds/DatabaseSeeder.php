<?php

use App\Models\Category;
use App\Models\Question;
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
        Schema::disableForeignKeyConstraints();
        factory(Category::class, 10)->create();
        factory(Question::class, 10)->create();
        $this->call(AnswerSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
