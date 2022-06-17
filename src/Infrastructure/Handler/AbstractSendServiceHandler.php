<?php

declare(strict_types=1);

namespace App\Infrastructure\Handler;

use App\Infrastructure\Client\ClientInterface;
use App\Infrastructure\Client\Request\Request;
use HttpResponseException;
use Throwable;

abstract class AbstractSendServiceHandler
{
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws HttpResponseException
     */
    public function sendRequest(Request $request): void
    {
        try {
            $response = $this->client->sendMessage($request);
        } catch (Throwable $exception) {
            throw new HttpResponseException($exception->getMessage(), $exception->getCode());
        }

        print_r("Сообщение успешно доставлено: {$response->getStatus()}");
    }
}