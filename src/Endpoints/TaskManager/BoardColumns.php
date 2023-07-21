<?php

namespace Weeek\Endpoints\TaskManager;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Endpoints\Endpoint;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\Responses\Response;
use Weeek\Responses\TaskManager\BoardColumn\BoardColumnListResponse;
use Weeek\Responses\TaskManager\BoardColumn\BoardColumnResponse;

class BoardColumns extends Endpoint
{
    protected $prefix = '/tm/board-columns';

    /**
     * @param int $boardId
     *
     * @return BoardColumnListResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getAll(int $boardId): BoardColumnListResponse
    {
        return $this->get('/', \compact('boardId'), BoardColumnListResponse::class);
    }

    /**
     * @param array{name: string, boardId: int} $data
     *
     * @return BoardColumnResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function create(array $data): BoardColumnResponse
    {
        return $this->post('/', $data, BoardColumnResponse::class);
    }

    /**
     * @param int                 $id
     * @param array{name: string} $data
     *
     * @return BoardColumnResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function update(int $id, array $data): BoardColumnResponse
    {
        return $this->put($id, $data, BoardColumnResponse::class);
    }

    /**
     * @param int  $id
     * @param ?int $upperBoardColumnId
     *
     * @return Response
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function move(int $id, ?int $upperBoardColumnId): Response
    {
        return $this->post(
            \sprintf('%d/move', $id),
            \compact('upperBoardColumnId'),
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
