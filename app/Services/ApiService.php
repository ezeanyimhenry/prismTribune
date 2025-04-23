<?php
namespace App\Services;

use App\Exceptions\ValidationResponseException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ApiService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.api.url');
    }

    public function getHeaders()
    {
        return [
            'Authorization' => 'Bearer ' . session('api_token'),
            'Accept' => 'application/json',
        ];
    }

    public function get($endpoint, $params = [])
    {
        $response = Http::withHeaders($this->getHeaders())
            ->get($this->baseUrl . $endpoint, $params);

        return $this->handleResponse($response);
    }

    public function post($endpoint, $data = [])
    {
        $response = Http::withHeaders($this->getHeaders())
            ->post($this->baseUrl . $endpoint, $data);

        return $this->handleResponse($response);
    }

    public function put($endpoint, $data = [])
    {
        $response = Http::withHeaders($this->getHeaders())
            ->put($this->baseUrl . $endpoint, $data);

        return $this->handleResponse($response);
    }

    public function delete($endpoint)
    {
        $response = Http::withHeaders($this->getHeaders())
            ->delete($this->baseUrl . $endpoint);

        return $this->handleResponse($response);
    }

    protected function handleResponse($response)
    {
        if ($response->successful()) {
            return $response->json();
        }

        if ($response->status() === 404) {
            redirect()->route(route: 'pageNotFound')->send();
        }

        if ($response->status() === 422) {
            $responseData = $response->json();

            throw new ValidationResponseException($responseData);
        }

        // throw exception
        return $response->throw()->json();
    }
}