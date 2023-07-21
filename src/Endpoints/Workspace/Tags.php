<?php

namespace Weeek\Endpoints\Workspace;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Endpoints\Endpoint;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\Responses\Response;
use Weeek\Responses\Workspace\Tag\TagListResponse;
use Weeek\Responses\Workspace\Tag\TagResponse;

class Tags extends Endpoint
{
    protected $prefix = '/ws/tags';

    /**
     * @return TagListResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getAll(): TagListResponse
    {
        return $this->get('/', [], TagListResponse::class);
    }

    /**
     * @param array{title: string} $data
     *
     * @return TagResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function create(array $data): TagResponse
    {
        return $this->post('/', $data, TagResponse::class);
    }

    /**
     * @param int $id
     *
     * @return TagResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getOne(int $id): TagResponse
    {
        return $this->get($id, [], TagResponse::class);
    }

    /**
     * @param int                                 $id
     * @param array{title: string, color: string} $data
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
