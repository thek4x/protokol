<?php

namespace App\Http\Controllers\Admin;

use App\Classes\DrugDto;
use App\Models\Drug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\drugStoreRequest;
use App\Services\DrugService;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_title = 'Bu alandan ilaçları yönetebilirsiniz.';
        $page_title = 'İlaç Yönetimi Sayfası';
        $drugs = Drug::withTitles()->get();
        return view('admin.drug.index', compact('sub_title', 'page_title', 'drugs'));
    }

    public function listBy(DrugService $service)
    {
        return response()->json($service->listBy(), 200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_title = 'İlaç Ekleme Sayfası';
        return view('admin.drug.create', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(drugStoreRequest $request, DrugService $service)
    {
        $saveId = $service->createDrug($request->toDto());
        return response()->json(['drug_id' => $saveId->id], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Drug $drug)
    {
        return response()->json(
            [
                'drug' => $drug,
                'titles' => $drug->titles
            ],
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drug $drug)
    {
        $page_title = 'İlaç Düzenleme Sayfası';
        return view('admin.drug.edit', compact('page_title'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drug $drug)
    {
        return $drug->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drug $drug)
    {
        $drug->titles()->delete();
        $drug->delete();
        return back()->with('success', 'İlaç başarıyla silindi.');
    }
}
