<?php

namespace Flavioalvespro\MicroservicesCommon\Services\Traits;

use Illuminate\Support\Facades\Http;

trait ConsumeExternalService
{
    public function headers(array $headers = [])
    {
        array_push($headers, [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $this->token
        ]);
        
        return Http::withHeaders($headers[0]);
    }

    public function request(
        string $method,
        string $endPoint,
        array $formParams = [],
        array $headers = []
    )
    {
        
        return $this->headers($headers)
        ->$method($this->url . $endPoint, $formParams);
    }
}