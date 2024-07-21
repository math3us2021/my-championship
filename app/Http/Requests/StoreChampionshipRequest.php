<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChampionshipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'championship_id' => 'required|integer',
            'teams' => 'required|array|size:8',
            'teams.*' => 'required|integer',
        ];
    }
}
