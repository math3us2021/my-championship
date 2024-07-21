<?php

namespace App\Http\Controllers;

use App\DTO\TeamDTO;
use App\Exceptions\InvalidParamsExceptions;
use App\Helpers\HttpResponseHelper;
use App\Http\Protocols\championship\ChampionshipServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ChampionshipController extends Controller
{
    protected ChampionshipServiceInterface $championshipService;

    public function __construct(ChampionshipServiceInterface $championshipService)
    {
        $this->championshipService = $championshipService;
    }

    public function index($id = null)
    {
        try {
            if ($id) {
                $dataTeam = $this->championshipService->get($id);
                if ($dataTeam === null) return HttpResponseHelper::badRequest(new InvalidParamsExceptions('Team not found'));
            } else {
                $dataTeam = $this->championshipService->get();
            }
            return HttpResponseHelper::ok($dataTeam,Response::HTTP_OK );
        } catch (Exception $e) {
            return HttpResponseHelper::serverError();
        }
    }

    public function store(Request $request, string $id = null)
    {
        try {

            $this->validate($request, [
                'name' => 'required|string',
            ]);

            $teamDTO = TeamDTO::fromRequest($request);

            if ($id) {
                $resp = $this->championshipService->update($id, $teamDTO);
                if ($resp === null) return HttpResponseHelper::badRequest(new InvalidParamsExceptions('Team not found'));
                return HttpResponseHelper::ok($resp, Response::HTTP_OK);
            } else {
                $resp = $this->championshipService->create($teamDTO);
                if ($resp === null) return HttpResponseHelper::serverError();
                return HttpResponseHelper::ok($resp, Response::HTTP_CREATED);
            }


        } catch (ValidationException $e) {
            $errors = $e->errors();
            return HttpResponseHelper::badRequest($errors);
        } catch (\Exception $e) {
            return HttpResponseHelper::serverError();
        }
    }

    public function destroy(string $id)
    {
        try {
            $deleteTeam = $this->championshipService->delete($id);
            if ($deleteTeam === null) {
                return HttpResponseHelper::badRequest(new InvalidParamsExceptions('Team not found'));
            }
            return HttpResponseHelper::ok('Team deleted successfully', Response::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            return HttpResponseHelper::serverError();
        }
    }
}
