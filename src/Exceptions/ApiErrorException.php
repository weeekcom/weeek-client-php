<?php

namespace Weeek\Exceptions;

use Psr\Http\Message\ResponseInterface;

class ApiErrorException extends WeeekException
{
    /**
     * @var int
     */
    public $statusCode = 0;

    /**
     * @var int|null
     */
    public $errorCode;

    /**
     * @var string|null
     */
    public $errorDetails;

    /**
     * @var array|null
     */
    public $validationErrors;

    /**
     * @var array
     */
    public $responseBody;

    /**
     * @param ResponseInterface $response
     * @param                   $responseBody
     * @param null              $previous
     */
    public function __construct(ResponseInterface $response, $responseBody, $previous = null)
    {
        $this->responseBody = $responseBody;
        $this->statusCode = $response->getStatusCode();
        $this->errorCode = $this->getErrorCodeFromResponseBody();

        $reasonPhrase = $response->getReasonPhrase();
        $this->errorDetails = $this->getErrorDetailsFromResponseBody() ?? (empty($reasonPhrase) ? null : $reasonPhrase);
        $this->validationErrors = $this->getValidationErrorsFromResponseBody();

        parent::__construct($this->buildMessage(), $this->statusCode, $previous);
    }

    public function buildMessage(): string
    {
        $result = 'Weeek request failed with status: ' . $this->statusCode;

        if (!\is_null($this->errorCode)) {
            $result .= ' - Code: ' . $this->errorCode;
        }

        if (!\is_null($this->errorDetails)) {
            $result .= ' - Details: ' . $this->errorDetails;
        }

        if (!\is_null($this->validationErrors)) {
            $validationErrors = '';

            foreach ($this->validationErrors as $attribute => $errors) {
                $validationErrors .= $attribute . ' (' . \implode(', ', $errors) . ')';
            }

            $result .= ' - Errors: ' . $validationErrors;
        }

        return $result;
    }

    private function getErrorCodeFromResponseBody(): ?string
    {
        if (\is_array($this->responseBody) && \array_key_exists('code', $this->responseBody)) {
            return $this->responseBody['code'];
        }

        return null;
    }

    private function getErrorDetailsFromResponseBody(): ?string
    {
        if (\is_array($this->responseBody) && \array_key_exists('message', $this->responseBody)) {
            return $this->responseBody['message'];
        }

        return null;
    }

    private function getValidationErrorsFromResponseBody(): ?array
    {
        if (\is_array($this->responseBody) && \array_key_exists('errors', $this->responseBody)) {
            return $this->responseBody['errors'];
        }

        return null;
    }
}
