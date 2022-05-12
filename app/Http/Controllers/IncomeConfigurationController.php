<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomeConfigurationRequest;
use App\Interfaces\IncomeConfigurationRepositoryInterface;
use App\Models\IncomeConfiguration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IncomeConfigurationController extends Controller
{

    private IncomeConfigurationRepositoryInterface $incomeConfigurationRepository;

    public function __construct(IncomeConfigurationRepositoryInterface $incomeConfigurationRepository)
    {
        $this->incomeConfigurationRepository = $incomeConfigurationRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeConfigurationRequest $request)
    {
        try {
            $incomeConfiguration = $this->incomeConfigurationRepository->createIncomeConfiguration(auth()->user(), $request->validated());

            return response()
                ->json([
                    "errorCode" => 0,
                    "message" => "Success",
                    'data' =>  $incomeConfiguration,
                ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()
                ->json([
                    "errorCode" => 1,
                    "message" => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomeConfiguration  $incomeConfiguration
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $incomeConfiguration = $this->incomeConfigurationRepository->getIncomeConfiguration(auth()->user());

        return response()
            ->json([
                "message" => "Success",
                'data' =>  $incomeConfiguration,
            ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeConfiguration  $incomeConfiguration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->incomeConfigurationRepository->deleteIncomeConfiguration(auth()->user());
        return response()
            ->json([
                "message" => "Success",
            ], Response::HTTP_OK);
    }
}
