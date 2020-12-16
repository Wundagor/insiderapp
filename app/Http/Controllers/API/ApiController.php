<?php

namespace App\Http\Controllers\API;

use App\Contracts\ISimulatorService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * @var ISimulatorService
     */
    private ISimulatorService $service;

    /**
     * ApiController constructor.
     *
     * @param ISimulatorService $service
     */
    public function __construct(ISimulatorService $service)
    {
        $this->service = $service;
    }

    /**
     * Get data for home page
     *
     * @return Response
     */
    public function index(): Response
    {
        return response($this->service->getCollection(), Response::HTTP_OK);
    }

    /**
     * Simulation of game
     *
     * @param Request $request
     * @return Response
     */
    public function simulate(Request $request): Response
    {
        return response($this->service->simulate($request), Response::HTTP_OK);
    }

    /**
     * Reset game
     *
     * @return Response
     */
    public function reset(): Response
    {
        return response($this->service->reset(), Response::HTTP_OK);
    }
}
