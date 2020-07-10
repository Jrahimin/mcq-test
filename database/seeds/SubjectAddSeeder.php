<?php

use App\Models\Subject;
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
            if(Subject::where('name', $subjectName)->where('status', 1)->first())
                continue;

            Subject::create([
                'name' => $subjectName
            ]);
        }
    }
}
