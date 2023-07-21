<?php

namespace Weeek\Endpoints\TaskManager;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Endpoints\Endpoint;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\Responses\Response;
use Weeek\Responses\TaskManager\Project\ProjectListResponse;
use Weeek\Responses\TaskManager\Project\ProjectResponse;

class Projects extends Endpoint
{
    protected $prefix = '/tm/projects';

    /**
     * @return ProjectListResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getAll(): ProjectListResponse
    {
        return $this->get('/', [], ProjectListResponse::class);
    }

    /**
     * @param array{name: string, isPrivate: bool} $data
     *
     * @return ProjectResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function create(array $data): ProjectResponse
    {
        return $this->post('/', $data, ProjectResponse::class);
    }

    /**
     * @param int $id
     *
     * @return ProjectResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getOne(int $id): ProjectResponse
    {
        return $this->get($id, [], ProjectResponse::class);
    }

    /**
     * @param int                                                                           $id
     * @param array{name: string, isPrivate: bool, description: string|null, color: string} $data
     *
     * @return ProjectResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function update(int $id, array $data): ProjectResponse
    {
        return $this->put($id, $data, ProjectResponse::class);
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
    public function archive(int $id): Response
    {
        return $this->post(
            \sprintf('/%s/archive', $id),
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
    public function unArchive(int $id): Response
    {
        return $this->post(
            \sprintf('/%s/un-archive', $id),
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
    public function destroy(int $id): Response
    {
        return $this->delete($id, [], Response::class);
    }
}
