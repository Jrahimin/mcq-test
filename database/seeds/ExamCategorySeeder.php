<?php

use App\Models\ExamCategory;
use Illuminate\Database\Seeder;

class ExamCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Enums\ExamCategoryNames::CATEGORIES;

        foreach ($categories as $categoryName)
        {
            if(ExamCategory::where('name', $categoryName)->first())
                continue;

            ExamCategory::create(['name' => $categoryName,]);
        }
    }
}
