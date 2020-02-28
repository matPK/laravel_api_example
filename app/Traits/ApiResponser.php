<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{

    /**
     * Build success response
     * @param  string|array $content
     * @param  int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function successResponse($content, $code = Response::HTTP_OK, $meta = [])
    {
        return response()->json(['meta' => $meta, 'content' => $content, 'code' => $code], $code);
    }

    /**
     * Build created response
     * @param  string|array $content
     * @return Illuminate\Http\JsonResponse
     */
    public function createdResponse($content)
    {
        return $this->successResponse($content, Response::HTTP_CREATED);
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
