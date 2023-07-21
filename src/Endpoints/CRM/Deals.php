<?php

namespace Weeek\Endpoints\CRM;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Endpoints\Endpoint;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\Responses\CRM\Deal\DealListResponse;
use Weeek\Responses\CRM\Deal\DealResponse;
use Weeek\Responses\Response;
use Weeek\Responses\TaskManager\Task\TaskResponse;

class Deals extends Endpoint
{
    protected $prefix = '/crm';

    /**
     * @param string $statusId
     * @param array{
     *     search: string,
     *     executorIds: array,
     *     winStatuses: array,
     *     lastUpdated: array,
     *     tags: array,
     *     limit: int,
     *     offset: int
     * }             $query
     *
     * @return DealListResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getAll(string $statusId, array $query = []): DealListResponse
    {
        return $this->get(
            \sprintf('/statuses/%s/deals', $statusId),
            $query,
            DealListResponse::class
        );
    }

    /**
     * @param string $statusId
     * @param array{
     *     executorId: string|null,
     *     organizationId: string|null,
     *     contactId: string|null,
     *     title: string|null,
     *     description: string|null,
     *     amount: float|null,
     *     winStatus: string|null,
     * }             $data
     *
     * @return DealResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function create(string $statusId, array $data): DealResponse
    {
        return $this->post(
            \sprintf('/statuses/%s/deals', $statusId),
            $data,
            DealResponse::class
        );
    }

    /**
     * @param string $id
     *
     * @return DealResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getOne(string $id): DealResponse
    {
        return $this->get(
            \sprintf('/deals/%s', $id),
            [],
            DealResponse::class
        );
    }

    /**
     * @param string $id
     * @param array{
     *     executorId: string|null,
     *     organizationId: string|null,
     *     contactId: string|null,
     *     title: string|null,
     *     description: string|null,
     *     amount: float|null,
     *     winStatus: string|null,
     * }             $data
     *
     * @return DealResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function update(string $id, array $data): DealResponse
    {
        return $this->patch(
            \sprintf('/deals/%s', $id),
            $data,
            DealResponse::class
        );
    }

    /**
     * @param string $id
     * @param string $funnelId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function updateFunnel(string $id, string $funnelId): Response
    {
        return $this->put(
            \sprintf('/deals/%s/funnel', $id),
            \compact('funnelId'),
            Response::class
        );
    }

    /**
     * @param string $id
     * @param string $statusId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function updateStatus(string $id, string $statusId): Response
    {
        return $this->put(
            \sprintf('/deals/%s/status', $id),
            \compact('statusId'),
            Response::class
        );
    }


    /**
     * @param string      $id
     * @param string|null $previousDealId
     * @param string|null $statusId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function move(string $id, ?string $previousDealId, ?string $statusId = null): Response
    {
        return $this->post(
            \sprintf('/deals/%s/move', $id),
            \compact('previousDealId', 'statusId'),
            Response::class
        );
    }

    /**
     * @param string $id
     * @param int    $tagId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function attachTag(string $id, int $tagId): Response
    {
        return $this->post(
            \sprintf('/deals/%s/tags', $id),
            ['tag' => $tagId],
            Response::class
        );
    }

    /**
     * @param string $id
     * @param int    $tagId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function detachTag(string $id, int $tagId): Response
    {
        return $this->delete(
            \sprintf('/deals/%s/tags', $id),
            ['tag' => $tagId],
            Response::class
        );
    }

    /**
     * @param string $id
     * @param array{
     *     title: string|null,
     *     day: string|null,
     *     parentId: int|null,
     *     userId: string|null,
     *     projectId: int|null,
     *     boardId: int|null,
     *     boardColumnId: int|null,
     *     type: string|null,
     *     priority: int|null
     * }             $data
     *
     * @return TaskResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function createSubtask(string $id, array $data): TaskResponse
    {
        return $this->post(
            \sprintf('/deals/%s/tasks', $id),
            $data,
            TaskResponse::class
        );
    }

    /**
     * @param string   $id
     * @param int      $taskId
     * @param int|null $previousTaskId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function moveSubtask(string $id, int $taskId, ?int $previousTaskId = null): Response
    {
        return $this->post(
            \sprintf('/deals/%s/tasks/%s/move', $id, $taskId),
            \compact('previousTaskId'),
            Response::class
        );
    }

    /**
     * @param string $id
     * @param int    $taskId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function detachSubtask(string $id, int $taskId): Response
    {
        return $this->delete(
            \sprintf('/deals/%s/tasks/%s', $id, $taskId),
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
        return $this->delete(
            \sprintf('/deals/%s', $id),
            [],
            Response::class
        );
    }
}
