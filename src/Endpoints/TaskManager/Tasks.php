<?php

namespace Weeek\Endpoints\TaskManager;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Endpoints\Endpoint;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\Responses\Response;
use Weeek\Responses\TaskManager\Task\TaskListResponse;
use Weeek\Responses\TaskManager\Task\TaskResponse;
use Weeek\Responses\TaskManager\Task\TaskUpdateBoardResponse;

class Tasks extends Endpoint
{
    protected $prefix = '/tm/tasks';

    /**
     * @param array{
     *     day: string,
     *     startDate: string,
     *     endDate: string,
     *     projectId: int,
     *     boardId: int,
     *     boardColumnId: int,
     *     userId: string,
     *     type: string,
     *     priority: int,
     *     search: string,
     *     completed: bool,
     *     perPage: int,
     *     offset: int,
     *     sortBy: string
     * } $query
     *
     * @return TaskListResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getAll(array $query = []): TaskListResponse
    {
        return $this->get('/', $query, TaskListResponse::class);
    }

    /**
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
     * } $data
     *
     * @return TaskResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function create(array $data): TaskResponse
    {
        return $this->post('/', $data, TaskResponse::class);
    }

    /**
     * @param int $id
     *
     * @return TaskResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getOne(int $id): TaskResponse
    {
        return $this->get($id, [], TaskResponse::class);
    }

    /**
     * @param int $id
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function complete(int $id): Response
    {
        return $this->post(
            \sprintf('%d/complete', $id),
            [],
            Response::class
        );
    }

    /**
     * @param int $id
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function unComplete(int $id): Response
    {
        return $this->post(
            \sprintf('%d/un-complete', $id),
            [],
            Response::class
        );
    }

    /**
     * @param int      $id
     * @param int|null $boardId
     *
     * @return TaskUpdateBoardResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function updateBoard(int $id, ?int $boardId): TaskUpdateBoardResponse
    {
        return $this->post(
            \sprintf('%d/board', $id),
            \compact('boardId'),
            TaskUpdateBoardResponse::class
        );
    }

    /**
     * @param int      $id
     * @param int      $boardColumnId
     * @param int|null $upperTaskId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function updateBoardColumn(int $id, int $boardColumnId, ?int $upperTaskId = null): Response
    {
        return $this->post(
            \sprintf('%d/board-column', $id),
            \compact('boardColumnId', 'upperTaskId'),
            Response::class
        );
    }

    /**
     * @param int      $id
     * @param int|null $userId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function subscribe(int $id, ?int $userId): Response
    {
        return $this->post(
            \sprintf('%d/subscribe', $id),
            \compact('userId'),
            Response::class
        );
    }

    /**
     * @param int      $id
     * @param int|null $userId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function unsubscribe(int $id, ?int $userId): Response
    {
        return $this->post(
            \sprintf('%d/un-subscribe', $id),
            \compact('userId'),
            Response::class
        );
    }

    /**
     * @param int $id
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function destroy(int $id): Response
    {
        return $this->delete($id, [], Response::class);
    }
}
