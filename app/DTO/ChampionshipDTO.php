<?php

namespace App\DTO;

use Illuminate\Http\Request;

class ChampionshipDTO
{
    public function __construct(public string $name)
    {
    }


    public static function fromRequest(Request $request): self
    {
        return new self($request->input('name'));
    }

}
