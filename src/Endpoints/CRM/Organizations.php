<?php

namespace Weeek\Endpoints\CRM;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Endpoints\Endpoint;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\Responses\CRM\Organization\OrganizationListResponse;
use Weeek\Responses\CRM\Organization\OrganizationResponse;
use Weeek\Responses\Response;

class Organizations extends Endpoint
{
    protected $prefix = '/crm/organizations';

    /**
     * @param array{
     *     search: string,
     *     limit: int,
     *     offset: int
     * } $query
     *
     * @return OrganizationListResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getAll(array $query = []): OrganizationListResponse
    {
        return $this->get('/', $query, OrganizationListResponse::class);
    }

    /**
     * @param array{
     *     name: string,
     *     addresses: array<string>,
     *     emails: array<string>,
     *     phones: array<string>,
     *     responsibles: array<string>
     * } $data
     *
     * @return OrganizationResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function create(array $data): OrganizationResponse
    {
        return $this->post('/', $data, OrganizationResponse::class);
    }

    /**
     * @param string $id
     *
     * @return OrganizationResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getOne(string $id): OrganizationResponse
    {
        return $this->get($id, [], OrganizationResponse::class);
    }

    /**
     * @param string $id
     * @param array{
     *     name: string,
     *     addresses: array<string>,
     *     emails: array<string>,
     *     phones: array<string>,
     *     responsibles: array<string>
     * }             $data
     *
     * @return OrganizationResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function update(string $id, array $data): OrganizationResponse
    {
        return $this->put($id, $data, OrganizationResponse::class);
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
