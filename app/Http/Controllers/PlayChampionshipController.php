<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidParamsExceptions;
use App\Helpers\HttpResponseHelper;
use App\Http\Protocols\playchampioship\PlayChampionshipServiceInterface;
use App\Http\Requests\StoreChampionshipRequest;
use Illuminate\Http\Request;
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
//        dd('aqui');
        try {


//            $teamDTO = ChampionshipDTO::fromRequest($request);
//
//
//                $resp = $this->championshipService->create($teamDTO);
//                if ($resp === null) return HttpResponseHelper::serverError();
                return HttpResponseHelper::ok([], Response::HTTP_CREATED);



        } catch (ValidationException $e) {
            $errors = $e->errors();
            return HttpResponseHelper::badRequest($errors);
        } catch (\Exception $e) {
            return HttpResponseHelper::serverError();
        }
    }


}
