<?php

declare(strict_types=1);

namespace App\Infrastructure\Client\Request;

final class Request
{
    private string $to;

    private string $eventId;

    private string $content;

    private string $messageUuid;

    private string $contractorId;

    public function __construct
    (
        string $to,
        string $eventId,
        string $content,
        string $messageUuid,
        string $contractorId
    ) {
        $this->to = $to;
        $this->eventId = $eventId;
        $this->content = $content;
        $this->messageUuid = $messageUuid;
        $this->contractorId = $contractorId;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function getEventId(): string
    {
        return $this->eventId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getMessageUuid(): string
    {
        return $this->messageUuid;
    }

    public function getContractorId(): string
    {
        return $this->contractorId;
    }
}