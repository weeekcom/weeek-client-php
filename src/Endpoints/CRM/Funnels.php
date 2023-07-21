<?php

namespace Weeek\Endpoints\CRM;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Endpoints\Endpoint;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\Responses\CRM\Funnel\FunnelListResponse;
use Weeek\Responses\CRM\Funnel\FunnelResponse;
use Weeek\Responses\Response;

class Funnels extends Endpoint
{
    protected $prefix = '/crm/funnels';

    /**
     * @return FunnelListResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getAll(): FunnelListResponse
    {
        return $this->get('/', [], FunnelListResponse::class);
    }

    /**
     * @param array{
     *     name: string,
     *     color: string,
     *     currencyId: int,
     *     isPrivate: bool
     * } $data
     *
     * @return FunnelResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function create(array $data): FunnelResponse
    {
        return $this->post('/', $data, FunnelResponse::class);
    }

    /**
     * @param string $id
     *
     * @return FunnelResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getOne(string $id): FunnelResponse
    {
        return $this->get($id, [], FunnelResponse::class);
    }

    /**
     * @param string                                                               $id
     * @param array{name: string, color: string, currencyId: int, isPrivate: bool} $data
     *
     * @return FunnelResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function update(string $id, array $data): FunnelResponse
    {
        return $this->put($id, $data, FunnelResponse::class);
    }

    /**
     * @param string      $id
     * @param string|null $previousFunnelId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function move(string $id, ?string $previousFunnelId): Response
    {
        return $this->post(
            \sprintf('/%s/move', $id),
            \compact('previousFunnelId'),
            Response::class
        );
    }

    /**
     * @param string $id
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function toggleBookmark(string $id): Response
    {
        return $this->post(
            \sprintf('/%s/bookmark', $id),
            [],
            Response::class
        );
    }

    /**
     * @param string $id
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function destroy(string $id): Response
    {
        return $this->delete($id, [], Response::class);
    }
}
