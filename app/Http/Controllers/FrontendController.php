<?php

namespace App\Http\Controllers;

use App\Http\Resources\drugList;
use App\Models\Drug;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //

    public function index()
    {
        return view('drugList');
    }

    public function listBy(Request $request)
    {
        return drugList::collection(Drug::query()->with('titles')->limit(10)->get());
    }

    public function details(Drug $drug)
    {
        $drug->load('titles');
        return view('drugDetails', compact('drug'));
    }
}
