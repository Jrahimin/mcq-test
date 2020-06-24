<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class TestQuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'exam_test_id' => $this->exam_test_id,
            'title' => $this->title,
            'description' => $this->description,
            'attachment_url' => $this->attachment_url,
            'mark' => $this->mark,
            'status' => $this->status,
            'answers' => $this->map(function ($answer) {
                return collect([
                    'question_id' => $answer->question_id,
                    'answer' => $answer->answer,
                    'image_url' => $answer->image_url,
                    'description' => $answer->description,
                    'is_correct' => $answer->is_correct,
                    'status' => $answer->status,
                ]);
            })
        ];
    }
}
