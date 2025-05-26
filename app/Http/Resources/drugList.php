<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class drugList extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'class' => $this->randCardClass(),
            'name' => $this->name,
            'description' => $this->description,
            'date' => $this->created_at->format('d M Y'),
            'titles' => $this->whenLoaded('titles', function () {
                return $this->titles->map(function ($title) {
                    $source = explode(',', $title->source);
                    if (count($source) > 1) {
                        $source = array_map(function ($url) {
                            $kaynak = trim($url);
                            if ($this->validate_url($kaynak)) {
                                return '<a href="' . $kaynak . '" target="_blank">' . $kaynak . '</a>';
                            } else {
                                return $kaynak;
                            }
                        }, $source);
                    }
                    return [
                        'title' => $title->title,
                        'content' => strip_tags($title->content, '<p>'),
                        'source' => $source,
                    ];
                });
            }),
        ];
    }

    public function randCardClass()
    {
        $list = ['card-bottom-border-danger', 'card-bottom-border-success', 'card-bottom-border-warning', 'card-bottom-border-info', 'card-bottom-border-purple'];
        return $list[array_rand($list)];
    }

    function validate_url($url)
    {
        $path = parse_url($url, PHP_URL_PATH);
        $encoded_path = array_map('urlencode', explode('/', $path));
        $url = str_replace($path, implode('/', $encoded_path), $url);

        return filter_var($url, FILTER_VALIDATE_URL) ? true : false;
    }
}
