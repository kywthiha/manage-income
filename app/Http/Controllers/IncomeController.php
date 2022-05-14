<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomeRequest;
use App\Interfaces\IncomeRepositoryInterface;
use App\Models\Income;
use App\Repositories\IncomeRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IncomeController extends Controller
{

    private IncomeRepository $incomeRepository;

    public function __construct(IncomeRepositoryInterface $incomeRepository)
    {
        $this->incomeRepository = $incomeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = $this->incomeRepository->getIncomes(auth()->user());
        return response()
            ->json([
                "errorCode" => 0,
                "message" => "Success",
                'data' => $incomes,
            ], Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeRequest $request)
    {
        $income = $this->incomeRepository->createIncome(auth()->user(), $request->validated());
        return response()
            ->json([
                "errorCode" => 0,
                "message" => "Success",
                'data' =>  $income,
            ], Response::HTTP_CREATED);
    }
}
