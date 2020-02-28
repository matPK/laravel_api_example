<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{

    /**
     * Build success response
     * @param  string|array $data
     * @param  int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function successResponse($data, $code = Response::HTTP_OK, $meta = [])
    {
        return response()->json(['meta' => $meta, 'data' => $data, 'code' => $code], $code);
    }

    /**
     * Build created response
     * @param  string|array $data
     * @return Illuminate\Http\JsonResponse
     */
    public function createdResponse($data)
    {
        return $this->successResponse($data, Response::HTTP_CREATED);
    }

    /**
     * Build deleted response
     * @return Illuminate\Http\JsonResponse
     */
    public function deletedResponse()
    {
        return $this->successResponse([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Build error responses
     * @param  string|array $message
     * @param  int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }
}
