<?php

namespace App\Http\Controllers;

use App\DTO\PlayChampionshipDTO;
use App\Helpers\HttpResponseHelper;
use App\Http\Protocols\playchampioship\PlayChampionshipServiceInterface;
use App\Http\Requests\StoreChampionshipRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PlayChampionshipController extends Controller
{
    protected PlayChampionshipServiceInterface $playChampionshipService;

    public function __construct(PlayChampionshipServiceInterface $playChampionshipService)
    {
        $this->playChampionshipService = $playChampionshipService;
    }

    public function index(StoreChampionshipRequest $request)
    {
//        dd($request);
        try {
            $teamDTO = PlayChampionshipDTO::fromRequest($request);
            $resp = $this->playChampionshipService->create($teamDTO);
            if ($resp === null) return HttpResponseHelper::serverError();
            return HttpResponseHelper::ok($resp, Response::HTTP_CREATED);

        } catch (\Exception $e) {
            return HttpResponseHelper::serverError();
        }
    }


}
