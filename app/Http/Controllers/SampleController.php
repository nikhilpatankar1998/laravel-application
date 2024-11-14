<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use App\Traits\SampleTraits;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    // use SampleTraits;

    // public function __construct()
    // {
        
    // }

    public function index(Request $request , PaymentService $paymentService){

        // dd($paymentService->process());
        return $request->all();
    }
    public function register(Request $request){

    }
}

