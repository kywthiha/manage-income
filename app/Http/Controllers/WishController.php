<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWishRequest;
use App\Interfaces\WishRepositoryInterface;
use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WishController extends Controller
{

    private WishRepositoryInterface $wishRepository;

    public function __construct(WishRepositoryInterface $wishRepository)
    {
        $this->wishRepository = $wishRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishs = $this->wishRepository->getWishs(auth()->user());
        return response()
            ->json([
                "errorCode" => 0,
                "message" => "Success",
                'data' => $wishs,
            ], Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPossibleWishs()
    {
        $wishs = $this->wishRepository->getWishs(auth()->user());
        return response()
            ->json([
                "errorCode" => 0,
                "message" => "Success",
                'data' => $wishs,
            ], Response::HTTP_OK);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWishRequest $request)
    {
        $wish = $this->wishRepository->createWish(auth()->user(), $request->validated());
        return response()
            ->json([
                "errorCode" => 0,
                "message" => "Success",
                'data' => $wish,
            ], Response::HTTP_CREATED);
    }
}
