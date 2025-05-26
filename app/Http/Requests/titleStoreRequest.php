<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class titleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
            'source' => 'nullable',
            'drug_id' => 'required'
        ];
    }
    
    public function toDto(): \App\Classes\TitleDto
    {
        return new \App\Classes\TitleDto(
            title: $this->input('title'),
            content: $this->input('content'),
            source: $this->input('source'),
            drug_id: $this->input('drug_id')
        );
    }
}
