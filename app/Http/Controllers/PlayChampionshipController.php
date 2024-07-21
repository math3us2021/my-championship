<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidParamsExceptions;
use App\Helpers\HttpResponseHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PlayChampionshipController extends Controller
{
    public function index(Request $request)
    {
        try {

            $this->validate($request, [
                'championship_id' => 'required|number',
                'team_1_id' => 'required|number',
                'team_2_id' => 'required|number',
                'team_3_id' => 'required|number',
                'team_4_id' => 'number',
            ]);

//            $teamDTO = ChampionshipDTO::fromRequest($request);
//
//
//                $resp = $this->championshipService->create($teamDTO);
//                if ($resp === null) return HttpResponseHelper::serverError();
                return HttpResponseHelper::ok($resp, Response::HTTP_CREATED);



        } catch (ValidationException $e) {
            $errors = $e->errors();
            return HttpResponseHelper::badRequest($errors);
        } catch (\Exception $e) {
            return HttpResponseHelper::serverError();
        }
    }
}
