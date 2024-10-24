<?php

namespace App\Http\Controllers;

use App\service\walletService;
use Illuminate\Http\Request;

class walletController extends Controller
{
    protected $walletService;

    public function __construct(walletService $walletService)
    {
        $this->walletService = $walletService;
    }

    public function getBalance()
    {
        $balance = $this->walletService->getBalance(env('NEAR_ACCOUNT_ID'));
        return response()->json(['balance' => $balance]);
    }
}