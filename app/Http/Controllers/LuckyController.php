<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Lucky;
use Illuminate\Http\Request;

class LuckyController extends Controller
{
    public function imFeelingLucky()
    {
        $lucky = Lucky::generateLuckyNumber(auth()->user());

        return view('lucky.index', ['lucky' => $lucky]);
    }

    public function history(Request $request)
    {
        $lucky = auth()->user()->getLastThreeLucky();

        return view('lucky.history', ['lucky' => $lucky]);
    }
}
