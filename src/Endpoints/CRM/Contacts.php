<?php

namespace Weeek\Endpoints\CRM;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Endpoints\Endpoint;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\Responses\CRM\Contact\ContactListResponse;
use Weeek\Responses\CRM\Contact\ContactResponse;
use Weeek\Responses\Response;

class Contacts extends Endpoint
{
    protected $prefix = '/crm/contacts';

    /**
     * @param array{
     *     search: string,
     *     limit: int,
     *     offset: int
     * } $query
     *
     * @return ContactListResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getAll(array $query = []): ContactListResponse
    {
        return $this->get('/', $query, ContactListResponse::class);
    }

    /**
     * @param array{
     *     organizationId: string|null,
     *     name: string,
     *     phone: string|null,
     *     email: string|null
     * } $data
     *
     * @return ContactResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function create(array $data): ContactResponse
    {
        return $this->post('/', $data, ContactResponse::class);
    }

    /**
     * @param string $id
     *
     * @return ContactResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getOne(string $id): ContactResponse
    {
        return $this->get($id, [], ContactResponse::class);
    }

    /**
     * @param string $id
     * @param array{
     *     organizationId: string|null,
     *     name: string,
     *     phone: string|null,
     *     email: string|null
     * }             $data
     *
     * @return ContactResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function update(string $id, array $data): ContactResponse
    {
        return $this->put($id, $data, ContactResponse::class);
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
