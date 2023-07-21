<?php

namespace Weeek\Endpoints\TaskManager;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Endpoints\Endpoint;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\Models\TaskManager\Board;
use Weeek\Responses\Response;
use Weeek\Responses\TaskManager\Board\BoardListResponse;
use Weeek\Responses\TaskManager\Board\BoardResponse;

class Boards extends Endpoint
{
    protected $prefix = '/tm/boards';

    /**
     * @return array<Board>
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getAll(int $projectId): array
    {
        return $this->get('/', \compact('projectId'), BoardListResponse::class);
    }

    /**
     * @param array{name: string, projectId: int} $data
     *
     * @return BoardResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function create(array $data): BoardResponse
    {
        return $this->post('/', $data, BoardResponse::class);
    }

    /**
     * @param int                 $id
     * @param array{name: string} $data
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function update(int $id, array $data): Response
    {
        return $this->put($id, $data, Response::class);
    }

    /**
     * @param int      $id
     * @param int|null $upperBoardId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function move(int $id, ?int $upperBoardId): Response
    {
        return $this->post(
            \sprintf('%d/move', $id),
            \compact('upperBoardId'),
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
