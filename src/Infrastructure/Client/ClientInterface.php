<?php

declare(strict_types=1);

namespace App\Infrastructure\Client;

use App\Infrastructure\Client\Request\Request;
use App\Infrastructure\Client\Response\Response;

interface ClientInterface
{
    public function sendMessage(Request $request): Response;
}