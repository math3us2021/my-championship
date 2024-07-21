<?php

namespace App\DTO;

use Illuminate\Http\Request;

class playChampionshipDTO
{
    public function __construct(public string $championshipId, public array $teams)
    {}


    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->input('championshipId'),
            $request->input('teams')
        );
    }

}
