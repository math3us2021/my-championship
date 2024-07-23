<?php

namespace App\Http\Controllers;

use App\DTO\PlayChampionshipDTO;
use App\Exceptions\InvalidParamsExceptions;
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
    public function index($id = null)
    {
        try {
            if ($id) {
                $dataTeam = $this->playChampionshipService->get($id);
                if ($dataTeam === null) return HttpResponseHelper::badRequest(new InvalidParamsExceptions('Team not found'));
            } else {
                $dataTeam = $this->playChampionshipService->get();
            }
            return HttpResponseHelper::ok($dataTeam,Response::HTTP_OK );
        } catch (Exception $e) {
            return HttpResponseHelper::serverError();
        }
    }


    public function create(StoreChampionshipRequest $request)
    {
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
