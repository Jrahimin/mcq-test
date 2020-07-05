<?php

use Illuminate\Database\Seeder;

class SubjectAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = \App\Enums\Subjects::SUBJECTLIST;

        foreach ($subjects as $subjectName)
        {
            \App\Models\Subject::create([
                'name' => $subjectName
            ]);
        }
    }
}
