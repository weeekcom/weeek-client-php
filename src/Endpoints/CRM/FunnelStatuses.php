<?php

namespace Weeek\Endpoints\CRM;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Endpoints\Endpoint;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\Responses\CRM\FunnelStatus\FunnelStatusListResponse;
use Weeek\Responses\CRM\FunnelStatus\FunnelStatusResponse;
use Weeek\Responses\Response;

class FunnelStatuses extends Endpoint
{
    protected $prefix = '/crm';

    /**
     * @param string $funnelId
     *
     * @return FunnelStatusListResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getAll(string $funnelId): FunnelStatusListResponse
    {
        return $this->get(
            \sprintf('/funnels/%s/statuses', $funnelId),
            [],
            FunnelStatusListResponse::class
        );
    }

    /**
     * @param string              $funnelId
     * @param array{name: string} $data
     *
     * @return FunnelStatusResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function create(string $funnelId, array $data): FunnelStatusResponse
    {
        return $this->post(
            \sprintf('/funnels/%s/statuses', $funnelId),
            $data,
            FunnelStatusResponse::class
        );
    }

    /**
     * @param string $id
     *
     * @return FunnelStatusResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getOne(string $id): FunnelStatusResponse
    {
        return $this->get(
            \sprintf('/statuses/%s', $id),
            [],
            FunnelStatusResponse::class
        );
    }

    /**
     * @param string              $id
     * @param array{name: string} $data
     *
     * @return FunnelStatusResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function update(string $id, array $data): FunnelStatusResponse
    {
        return $this->put(
            \sprintf('/statuses/%s', $id),
            $data,
            FunnelStatusResponse::class
        );
    }

    /**
     * @param string      $id
     * @param string|null $previousStatusId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function move(string $id, ?string $previousStatusId): Response
    {
        return $this->post(
            \sprintf('/statuses/%s/move', $id),
            \compact('previousStatusId'),
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
        return $this->delete(
            \sprintf('/statuses/%s', $id),
            [],
            Response::class
        );
    }
}
