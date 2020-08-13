<?php

namespace App\Imports;

use App\Models\Answer;
use App\Models\TestQuestion;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionImport implements ToCollection, WithHeadingRow
{
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection(Collection $rows)
    {
        Log::debug("Question import rows collection : ".json_encode($rows));

        foreach ($rows as $row) {
            $validator = Validator::make($row->toArray(), [
                'question' => 'required',
                'option_1' => 'required',
                'option_2' => 'required',
                'option_3' => 'required',
                'option_4' => 'required',
                'is_correct_1' => 'required|integer',
                'is_correct_2' => 'required|integer',
                'is_correct_3' => 'required|integer',
                'is_correct_4' => 'required|integer',
                'is_correct_5' => 'nullable|integer',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }

            DB::beginTransaction();

            $question = TestQuestion::create([
                'exam_test_id' => $this->request->exam_test_id,
                'subject_id'   => $this->request->subject_id,
                'mark'         => $this->request->mark,
                'title'        => $row['question'],
            ]);

            for ($i = 1; $i < 10; $i++) {
                if (!isset($row['option_' . $i]))
                    break;

                Answer::create([
                    'question_id' => $question->id,
                    'answer' => $row['option_' . $i],
                    'is_correct' => $row['is_correct_' . $i] ? 1 : 0,
                ]);
            }

            DB::commit();
        }
    }
}
