<?php

namespace App\Services;

use App\Classes\DrugDto;
use App\Models\drugTitle;

class TitleService
{
    public function createTitle($data)
    {
        foreach ($data['ilaclar'] as $ilacData) {
            drugTitle::create([
                'drug_id' => $data['drugId'],
                'title' => $ilacData['title'],
                'content' => $ilacData['content'],
                'source' => $ilacData['source']
            ]);
        }
    }
}
