<?php

namespace App\Http\Controllers;

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

    public function index(){
        try {
            $dataTeam = $this->teamService->get();
            if ($dataTeam == null) return HttpResponseHelper::serverError();
            return HttpResponseHelper::ok($dataTeam);

        }catch (Exception $e){
            return HttpResponseHelper::serverError();
        }
    }
}
