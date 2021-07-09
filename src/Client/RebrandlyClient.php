<?php

namespace Luisfergago\Rebrandlyvel\Client;

use Throwable;
use Exception;
use RuntimeException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\ClientInterface;
use PSR\http\Message\ResponseInterface;
use Luisfergago\Rebrandlyvel\Exceptions\NotFoundException;
use Luisfergago\Rebrandlyvel\Exceptions\ValidationException;

/**
 * Class RebrandlyClient
 */
class RebrandlyClient
{
    private $client;
    private $api_key;
    private $api_base_url;
    private $api_version;

    public function __construct(ClientInterface $client, $api_key)
    {
        $this->client = $client;
        $this->api_key = $api_key;
        $this->api_base_url = config('rebrandly.api_base_url');
        $this->api_version = config('rebrandly.api_version');
    }

    /**
     * Build the API base url.
     * 
     * @return string 
     */
    public function getApiBaseUrl()
    {
        return $this->api_base_url . $this->api_version . "/links/";
    }

    /**
     * Make request to Rebrandly and return the response.
     *
     * @param  string $verb
     * @param  array  $payload
     * @param  array  $keys
     * @param  string $ApiBaseUrl
     * @return array
     */
    protected function request($verb, array $payload = [], array $keys = [], $ApiBaseUrl = '')
    {
        $header = [
            'apikey' => $this->api_key,
            'Content-Type'  => 'application/json',
        ];

        $request = new Request(
            $verb,
            $ApiBaseUrl,
            $header,
            json_encode($payload)
        );

        $response = $this->client->send($request, ['http_errors' => false]);

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            return $this->handleRequestError($response);
        }

        $responseBody = (string) $response->getBody();

        return $this->getKeys($responseBody, $keys);
    }

    /**
     * Create a new shortlink.
     * 
     * @param array $url 
     * @return array 
     * @throws Throwable 
     * @throws RuntimeException 
     */
    public function create(array $body): array
    {

        return $this->request('POST', $body, ['id', 'shortUrl'], $this->getApiBaseUrl());
    }

    /**
     * Update shortlink attributes.
     * 
     * @param string $string
     * @param array  $body 
     * @return mixed 
     * @throws Throwable 
     */
    public function update(string $id, array $body): array
    {

        return $this->request('POST', $body, ['id', 'shortUrl'], $this->getApiBaseUrl() . $id);
    }

    /**
     * Handle the request error.
     *
     * @param  \Psr\Http\Message\ResponseInterface  $response
     * @return void
     *
     * @throws \Exception
     * @throws \Luisfergago\Rebrandlyvel\Exceptions
     */
    protected function handleRequestError(ResponseInterface $response)
    {
        if ($response->getStatusCode() == 403) {
            throw new ValidationException(json_decode((string) $response->getBody(), true));
        }

        if ($response->getStatusCode() == 404) {
            throw new NotFoundException(json_decode((string) $response->getBody(), true));
        }

        throw new Exception((string) $response->getBody());
    }

    /**
     * Returns keys from response.
     *
     * @param  String  $response
     * @return array
     */
    public function getKeys($response, array $keys)
    {
        $content = json_decode($response, true);

        $values = array_intersect_key(
            $content,
            array_flip(
                $keys
            )
        );

        return $values;
    }
}
