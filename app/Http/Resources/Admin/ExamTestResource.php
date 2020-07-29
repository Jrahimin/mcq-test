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
            'name' => $this->category->name??'',
            'category_id' => $this->category->id??'',
            'id' => $this->id,
            'exam_pack_id' => $this->exam_pack_id,
            'exam_pack_title' => $this->examPack->title ?? '',
            'title' => $this->title,
            'exam_schedule' => Carbon::parse($this->exam_schedule)->format('Y-m-d H:i:s'),
            'duration_minutes' => $this->duration_minutes,
            'price' => $this->price,
            'mark_per_question' => $this->mark_per_question,
            'negative_mark_per_question' => $this->negative_mark_per_question,
            'type' => $this->type,
            'status' => $this->status
        ];
    }
}
