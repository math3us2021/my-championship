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
            'championship_id' => 'integer',
            'team_1_id' => 'required|integer',
            'team_2_id' => 'required|integer',
            'team_3_id' => 'required|integer',
            'team_4_id' => 'required|integer',
            'team_5_id' => 'required|integer',
            'team_6_id' => 'required|integer',
            'team_7_id' => 'required|integer',
            'team_8_id' => 'required|integer',
        ];
    }
}
