<?php

namespace App\Http\Controllers;

use App\DTO\TeamDTO;
use App\Exceptions\InvalidParamsExceptions;
use App\Helpers\HttpResponseHelper;
use App\Http\Protocols\team\TeamServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class TeamController extends Controller
{
    protected TeamServiceInterface $teamService;

    public function __construct(TeamServiceInterface $teamService)
    {
        $this->teamService = $teamService;
    }

    public function index($id = null)
    {
        try {
            if ($id) {
                $dataTeam = $this->teamService->get($id);
                if ($dataTeam === null) return HttpResponseHelper::badRequest(new InvalidParamsExceptions('Team not found'));
            } else {
                $dataTeam = $this->teamService->get();
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
                $resp = $this->teamService->update($id, $teamDTO);
                if ($resp === null) return HttpResponseHelper::badRequest(new InvalidParamsExceptions('Team not found'));
                return HttpResponseHelper::ok($resp, Response::HTTP_OK);
            } else {
                $resp = $this->teamService->create($teamDTO);
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
            $deleteTeam = $this->teamService->delete($id);
            if ($deleteTeam === null) {
                return HttpResponseHelper::badRequest(new InvalidParamsExceptions('Team not found'));
            }
            return HttpResponseHelper::ok('Team deleted successfully', Response::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            return HttpResponseHelper::serverError();
        }
    }
}
