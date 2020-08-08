<?php

namespace App\Http\Controllers\Api\LangConstructor;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\LangConstructor\Requests\SaveLangConstructorRequest;
use App\Services\Constructions\ConstructionsService;
use App\Http\Controllers\Api\LangConstructor\Resources\ConstructionResource;
use App\Http\Controllers\Api\LangConstructor\Resources\ConstructionsResource;
use App\Models\Construction;


class LangConstructorController extends Controller
{
    protected $constructionsService;


    public function __construct(
        ConstructionsService $constructionsService
    )
    {
        $this->constructionsService = $constructionsService;

    }

    public function index()
    {

        $constructions = $this->constructionsService->getAllConstructionCached();
        return response()->json(new ConstructionsResource($constructions));
    }


    public function store(SaveLangConstructorRequest $request)
    {

        $data = $request->getFormData();

        $construction = $this->constructionsService->createConstruction($data);

        return response()->json(new ConstructionResource($construction));
    }


    public function show(Construction $constructions)
    {
        return response()->json(new ConstructionResource($constructions));
    }


    public function update(SaveLangConstructorRequest $request,Construction $constructions)
    {
        $data = $request->getFormData();



        $construction = $this->constructionsService->createOrUpdateConstruction($constructions,$data);

        return response()->json(new ConstructionResource($construction));
    }


    public function destroy(Construction $constructions)
    {
        $constructions->delete();
    }


}
