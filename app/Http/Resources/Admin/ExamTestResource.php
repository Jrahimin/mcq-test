<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamTestResource extends JsonResource
{
    public $preserveKeys = true;
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'exam_pack_id' => $request->exam_pack_id,
            'title' => $request->title,
            'exam_schedule' => Carbon::parse($request->exam_schedule)->format('Y-m-d H:i:s'),
            'duration_minutes' => $request->duration_minutes,
            'price' => $request->price,
            'mark_per_question' => $request->mark_per_question,
            'negative_mark_per_question' => $request->negative_mark_per_question,
            'type' => $request->type,
            'status' => $request->status
        ];
    }
}
