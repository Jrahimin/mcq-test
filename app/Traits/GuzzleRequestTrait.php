<?php

namespace App\Traits;

use App\Models\RequestResponseLog;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

trait GuzzleRequestTrait
{
    public function guzzlePost(string $base, string $api, array $formParams)
    {
//        Log::debug("in guzzle request: " . print_r($formParams, true));
//        Log::debug("url: " . $base . $api);
        $client = new Client(['base_uri' => $base]);
        $response = $client->post($api, [
            'debug' => FALSE,
            'form_params' => $formParams,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ]
        ]);

        return $response;
    }

    public function guzzleGet(string $base, string $api, array $formParams)
    {
        Log::debug("in guzzle request: " . print_r($formParams, true));

        $client = new Client(['base_uri' => $base]);
        $response = $client->get($api, [
            'debug' => FALSE,
            'query' => $formParams,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ]
        ]);

        return $response;
    }

    public function requestResponseLogCreate($transaction_id, $user_id, $requested_at, $request_params, $url, $status = 'processing')
    {
        $requestResponseLog = RequestResponseLog::create([
            'transaction_id' => $transaction_id,
            'user_id' => $user_id,
            'requested_at' => $requested_at,
            'request_params' => $request_params,
            'status' => $status,
            'url' => $url
        ]);

        return $requestResponseLog ? true : false;
    }

    public function requestReponseLogUpdate($transaction_id, $response_at, $response_params, $status)
    {
        $requestResponseLog = RequestResponseLog::where('transaction_id', $transaction_id)->first();
        if ($requestResponseLog)
            $requestResponseLog = $requestResponseLog->update([
                'response_at' => $response_at,
                'response_params' => $response_params,
                'status' => $status,
            ]);
        return $requestResponseLog ? true : false;
    }
}
