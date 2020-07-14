<?php


namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait ApiResponseTrait
{
    public function exceptionResponse(string $exception, int $code = 500)
    {
        return response()->json([
            'code' => $code,
            'message' => $exception,
            'data' => null
        ], 200);
    }

    /**
     * Invalid Request Response / Custom Validation Response
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function invalidResponse(string $message, int $code = 422)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => null
        ], 200);
    }

    public function successResponse(string $message, $data, $encryption = false)
    {
        if (config('app.env') == 'local')
            $encryption = false;

        return response()->json([
            'code' => 200,
            'message' => $message,
            'status' => 'success',
            'data' => ($encryption) ? self::_encrypt_string(json_encode($data)) : $data
        ], 200);
    }

    /**
     * Response with Access Token
     *
     * @param $accessToken
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithAccessToken($accessToken)
    {
        return response()->json([
            'code' => 200,
            'message' => "Access token generation success",
            'data' => $accessToken
        ], 200);
    }

    public function unauthorizedResponse(string $message)
    {
        return response()->json([
            'code' => 401,
            'message' => $message,
            'data' => ""
        ], 200);
    }

    public function _encrypt_string($data = "")
    {
        $iv = str_random(16);
        $encrypted = openssl_encrypt($data, "aes-256-cbc", 'NR1Aq4PhAT3H64IKEDLkrjqTBoEYqBbC', 0, $iv);

        return base64_encode($iv . '||' . $encrypted);
    }

    /**
     * Invalid Request Response / Custom Validation Response
     *
     * @param string $message
     * @param string $middleware
     * @return \Illuminate\Http\JsonResponse
     */
    public function middlewareResponse(string $message, $middleware = null)
    {
        return response()->json([
            'code' => 900,
            'message' => $message,
            'middleware' => $middleware
        ], 200);
    }


    public function successVueResponse($message, $data = null)
    {
        return response()->json([
            'code' => 200,
            'message' => $message,
            'data' => $data
        ], 200);
    }

    public function handleResponse($responseObj, $message, $data = false, $encryption = false)
    {
        if ($responseObj->status != 200)
            return $this->invalidResponse($responseObj->errorMessage, $responseObj->status ?? 422);

        return $this->successResponse($message, $data ? $responseObj : NULL, $encryption);
    }

    public function handleException($responseObj, \Exception $e, $scriptFileName)
    {
        Log::error('Found Parser Exception :' . $e->getMessage() . ' [Script: ' . $scriptFileName . '] [Origin: ' . $e->getFile() . '-' . $e->getLine() . ']');
        $responseObj->status = 500;
        $responseObj->errorMessage = "Something went wrong. Please try again later.";

        return $responseObj;
    }
}
