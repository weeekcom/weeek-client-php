<?php

namespace Weeek;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\Utils\UrlUtil;

class HttpClient
{
    use UrlUtil;

    /**
     * @var ClientInterface
     */
    private $http;
    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;
    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;
    /**
     * @var array
     */
    private $headers;
    /**
     * @var string
     */
    private $baseUrl;

    public function __construct(
        string                  $token,
        ?string                 $baseUrl = null,
        ClientInterface         $httpClient = null,
        RequestFactoryInterface $reqFactory = null,
        StreamFactoryInterface  $streamFactory = null
    )
    {
        $this->baseUrl = $baseUrl;
        $this->http = $httpClient ?? Psr18ClientDiscovery::find();
        $this->requestFactory = $reqFactory ?? Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory ?? Psr17FactoryDiscovery::findStreamFactory();
        $this->headers = [
            'Accept'        => 'application/json',
            'User-Agent'    => \sprintf('Weeek PHP (v%s)', Client::VERSION),
            'Authorization' => \sprintf('Bearer %s', $token),
        ];
    }

    /**
     * @param string $path
     * @param array  $query
     *
     * @return mixed
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function get(string $path, array $query = [])
    {
        $request = $this->requestFactory->createRequest('GET', $this->buildUri($path, $query));

        return $this->execute($request);
    }

    /**
     * @param string      $path
     * @param mixed       $body
     * @param array       $query
     * @param string|null $contentType
     *
     * @return mixed
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function post(string $path, $body = null, array $query = [], string $contentType = null)
    {
        $body = $this->encodeBody($body, $contentType);

        $request = $this->requestFactory
            ->createRequest('POST', $this->buildUri($path, $query))
            ->withBody($this->streamFactory->createStream($body));

        return $this->execute($request);
    }

    /**
     * @param string      $path
     * @param mixed       $body
     * @param array       $query
     * @param string|null $contentType
     *
     * @return mixed
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function put(string $path, $body = null, array $query = [], string $contentType = null)
    {
        $body = $this->encodeBody($body, $contentType);

        $request = $this->requestFactory
            ->createRequest('PUT', $this->buildUri($path, $query))
            ->withBody($this->streamFactory->createStream($body));

        return $this->execute($request);
    }

    /**
     * @param string      $path
     * @param mixed       $body
     * @param array       $query
     * @param string|null $contentType
     *
     * @return mixed
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function patch(string $path, $body = null, array $query = [], string $contentType = null)
    {
        $body = $this->encodeBody($body, $contentType);

        $request = $this->requestFactory
            ->createRequest('PATCH', $this->buildUri($path, $query))
            ->withBody($this->streamFactory->createStream($body));

        return $this->execute($request);
    }

    /**
     * @param string      $path
     * @param array       $query
     * @param mixed       $body
     * @param string|null $contentType
     *
     * @return mixed|null
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function delete(string $path, array $query = [], $body = null, string $contentType = null)
    {
        $body = $this->encodeBody($body, $contentType);

        $request = $this->requestFactory
            ->createRequest('DELETE', $this->buildUri($path, $query))
            ->withBody($this->streamFactory->createStream($body));

        return $this->execute($request);
    }

    /**
     * @param RequestInterface $request
     *
     * @return mixed
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    private function execute(RequestInterface $request)
    {
        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        try {
            return $this->parseResponse($this->http->sendRequest($request));
        } catch (NetworkExceptionInterface $e) {
            throw new TransportException($e->getMessage(), $e->getCode(), $e);
        }
    }

    private function buildQueryString(array $queryParams = []): string
    {
        return \count($queryParams) > 0 ? '?' . \http_build_query($queryParams) : '';
    }

    /**
     * @param ResponseInterface $response
     *
     * @return mixed|null
     * @throws ApiErrorException
     * @throws UnexpectedResponseException
     */
    private function parseResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() === 204) {
            return null;
        }

        $contents = $response->getBody()->getContents();

        if (!\in_array('application/json', $response->getHeader('content-type'), true)) {
            throw new UnexpectedResponseException($contents);
        }

        $body = \json_decode($contents, true);

        if ($response->getStatusCode() >= 300) {
            throw new ApiErrorException($response, $body ?? $response->getReasonPhrase());
        }

        return \json_decode($contents, true);
    }

    /**
     * @param string $path
     * @param array  $query
     *
     * @return string
     */
    private function buildUri(string $path, array $query): string
    {
        return $this->concatSegments($this->baseUrl, $path) . $this->buildQueryString($query);
    }

    /**
     * @param string|null $contentType
     * @param mixed       $body
     *
     * @return mixed
     */
    private function encodeBody($body, ?string $contentType = null)
    {
        if (!\is_null($contentType)) {
            $this->headers['Content-type'] = $contentType;
        } else {
            $this->headers['Content-type'] = 'application/json';
            $body = \json_encode($body);
        }

        return $body;
    }
}
