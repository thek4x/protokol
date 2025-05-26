<?php

namespace App\Classes;

class DrugDto
{
    public function __construct(
        public string $name,
        public ?string $description,
        public ?int $source_id,
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'source_id' => $this->source_id,
        ];
    }
}
