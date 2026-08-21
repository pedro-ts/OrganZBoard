<?php

namespace App\Http\Controllers\Api\Local;

use App\Data\Local\LocalData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Local\StoreLocalRequest;
use App\Http\Requests\Local\UpdateLocalRequest;
use App\Http\Resources\LocalResource;
use App\Models\Local;
use App\Services\LocalService;

class LocalController extends Controller
{
    public function __construct(private readonly LocalService $localService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locals = $this->localService->getAll(true);

        return LocalResource::collection($locals);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocalRequest $request)
    {
        $data = LocalData::fromArray($request->validated());

        $local = $this->localService->create($data);

        return new LocalResource($local);
    }

    /**
     * Display the specified resource.
     */
    public function show(Local $local)
    {
        $local = $this->localService->getOne($local);

        return new LocalResource($local);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocalRequest $request, Local $local)
    {
        $data = LocalData::fromArray($request->validated());

        $local = $this->localService->update($data, $local);

        return new LocalResource($local);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Local $local)
    {
        $this->localService->delete($local);

        return response()->noContent();
    }
}
