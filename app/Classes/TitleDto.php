<?php

namespace App\Classes;

class TitleDto
{
    public function __construct(
        public string $title,
        public string $content,
        public string $source,
        public int $drug_id,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'source' => $this->source,
            'drug_id' => $this->drug_id,
        ];
    }
}
