<?php

namespace App\Http\Responses;

use Symfony\Component\HttpFoundation\Response;

final class RespondSuccessJson extends AbstractRespondJson
{

    /**
     *
     * @param string $message
     * @param mixed $result
     */
    public function __construct(string $message = '', $result = null)
    {
        $this->message = $message;
        $this->result = $result;
    }

    /**
     *
     * @return int
     */
    public function getResponseHeader(): int
    {
        return Response::HTTP_OK;
    }
}
