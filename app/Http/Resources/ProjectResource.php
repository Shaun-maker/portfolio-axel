<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        $french_truncated_start_date = $this->start_date->locale('fr_FR')->translatedFormat('M Y');
        $french_truncated_end_date = $this->end_date->locale('fr_FR')->translatedFormat('M Y');

        $only_date_start = $this->start_date->format('Y-m-d');
        $only_date_end = $this->end_date->format('Y-m-d');

        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'start_date' => $french_truncated_start_date,
            'french_truncated_start_date' => $french_truncated_start_date,
            'french_truncated_end_date' => $french_truncated_end_date,
            'end_date' => $this->end_date,
            'only_date_start' => $only_date_start,
            'only_date_end' => $only_date_end,
            'title' => $this->title,
            'url_image' => $this->url_image,
            'url_image_webp' => $this->url_image_webp,
            'description' => $this->description,
            'project_link' => $this->project_link,
            'source_link' => $this->source_link,
            'tools' => $this->tools,
        ];
    }
}
