<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Country Resource
 */
class Country extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'type' => $this->resource::$type,
            'attributes' => [
                $this->attributes(['id', 'name', 'region_code', 'wikipedia_title']),
                'initial_paragraphs'  => $this->when($this->initial_paragraphs, $this->initial_paragraphs),
                'videos' => $this->when(isset($this->videos), function () {
                    return Video::collection(collect($this->videos['items']));
                }),
            ],

        ];
    }
}
