<?php

namespace App\Http\Controllers;

use App\DTO\ConvenioDTO;
use App\DTO\TeamDTO;
use App\Exceptions\MissingParamsExceptions;
use App\Helpers\HttpResponseHelper;
use App\Http\Protocols\team\TeamServiceInterface;
use Exception;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    protected TeamServiceInterface $teamService;

    public function __construct(TeamServiceInterface $teamService)
    {
        $this->teamService = $teamService;
    }

    public function index()
    {
        try {
            $dataTeam = $this->teamService->get();
            if ($dataTeam === null) return HttpResponseHelper::serverError();
            return HttpResponseHelper::ok($dataTeam);

        } catch (Exception $e) {
            return HttpResponseHelper::serverError();
        }
    }

    public function show($id)
    {
        try {
            $dataTeam = $this->teamService->get($id);
            if ($dataTeam === null) return HttpResponseHelper::serverError();
            return HttpResponseHelper::ok($dataTeam);


        } catch (Exception $e) {
            return HttpResponseHelper::serverError();
        }
    }

    public function store(Request $request)
    {
        try {
            $requiredFields = ['name'];
            foreach ($requiredFields as $field) {
                if (!$request->has($field)) {
                    return HttpResponseHelper::badRequest(new MissingParamsExceptions($field));
                }
            }

            $this->validate($request, [
                'name' => 'required|string',
            ]);

            $teamDTO = TeamDTO::fromRequest($request);

            $resp = $this->teamService->create($teamDTO);
            if ($resp === null) return HttpResponseHelper::serverError();
            return HttpResponseHelper::ok($resp);

        } catch (\Exception $e) {
            return HttpResponseHelper::serverError();
        }
    }

}
