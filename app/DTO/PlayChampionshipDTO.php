<?php

namespace App\DTO;

use Illuminate\Http\Request;

class PlayChampionshipDTO
{
    public function __construct(public string $championshipId, public array $teams)
    {}

    public static function fromRequest(Request $request): self
    {
        $data = $request->json()->all();
        return new self(
            $data['championship_id'],
            $data['teams']
        );
    }

}
