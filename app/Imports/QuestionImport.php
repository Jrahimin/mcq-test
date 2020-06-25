<?php

namespace App\Imports;

use App\Models\Answer;
use App\Models\TestQuestion;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $question = TestQuestion::create([
                'exam_test_id' => 1,
                'title' => $row['question'],
            ]);

            for($i=1; $i<6; $i++)
            {
                if(!$row['option_'.$i])
                    break;

                Answer::create([
                    'question_id' => $question->id,
                    'answer' => $row['option_'.$i],
                    'is_correct' => $row['is_correct_'.$i] ? 1 : 0,
                ]);
            }
        }
    }
}
