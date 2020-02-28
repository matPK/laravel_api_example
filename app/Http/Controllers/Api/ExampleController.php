<?php

namespace App\Http\Controllers\Api;

use App\Example;
use App\Http\Requests\Example\ExampleStoreRequest;
use App\Http\Requests\Example\ExampleUpdateRequest;

class ExampleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $examples = Example::all();
        return $this->successResponse($examples);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ExampleStoreRequest $request)
    {
        $validated_example = $request->validated();
        $example = Example::create($validated_example);
        return $this->createdResponse($example);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Example  $example
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Example $example)
    {
        return $this->successResponse($example);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Example  $example
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ExampleUpdateRequest $request, Example $example)
    {
        $validated_example = $request->validated();
        $example->fill($validated_example);
        if ($example->isDirty()) {
            $example->save();
        }
        return $this->successResponse($example);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Example  $example
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Example $example)
    {
        $example->delete();
        return $this->deletedResponse();
    }
}
