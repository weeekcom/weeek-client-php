<?php

namespace Weeek\Endpoints;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\HttpClient;
use Weeek\Utils\UrlUtil;

class Endpoint
{
    use UrlUtil;

    /**
     * @var HttpClient
     */
    protected $http;
    /**
     * @var string|null
     */
    protected $prefix;

    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    /**
     * @param string      $path
     * @param array       $query
     * @param string|null $type
     *
     * @return mixed
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    protected function get(string $path, array $query = [], ?string $type = null)
    {
        return $this->prepareResponse(
            $this->http->get($this->concatSegments($this->prefix, $path), $query),
            $type
        );
    }

    /**
     * @param string      $path
     * @param array       $body
     * @param string|null $type
     *
     * @return mixed
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    protected function post(string $path, array $body = [], ?string $type = null)
    {
        return $this->prepareResponse(
            $this->http->post($this->concatSegments($this->prefix, $path), $body),
            $type
        );
    }

    /**
     * @param string      $path
     * @param array       $body
     * @param string|null $type
     *
     * @return mixed
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    protected function put(string $path, array $body = [], ?string $type = null)
    {
        return $this->prepareResponse(
            $this->http->put($this->concatSegments($this->prefix, $path), $body),
            $type
        );
    }

    /**
     * @param string      $path
     * @param array       $body
     * @param string|null $type
     *
     * @return mixed
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    protected function patch(string $path, array $body = [], ?string $type = null)
    {
        return $this->prepareResponse(
            $this->http->patch($this->concatSegments($this->prefix, $path), $body),
            $type
        );
    }

    /**
     * @param string      $path
     * @param array       $body
     * @param string|null $type
     *
     * @return mixed
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    protected function delete(string $path, array $body = [], ?string $type = null)
    {
        return $this->prepareResponse(
            $this->http->delete($this->concatSegments($this->prefix, $path), [], $body),
            $type
        );
    }

    protected function prepareResponse(array $response, ?string $type = null)
    {
        $result = $response;

        if ($type !== null) {
            $result = new $type($response);
        }

        return $result;
    }
}
