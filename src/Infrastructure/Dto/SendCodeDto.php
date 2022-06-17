<?php

declare(strict_types=1);

namespace App\Infrastructure\Dto;

final class SendCodeDto
{
    private string $to;

    private string $sendType;

    private string $code;

    private ?string $clientIp;

    public function __construct(string $to, string $sendType, string $code, ?string $clientIp)
    {
        $this->to = $to;
        $this->sendType = $sendType;
        $this->code = $code;
        $this->clientIp = $clientIp;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function getSendType(): string
    {
        return $this->sendType;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getClientIp(): ?string
    {
        return $this->clientIp;
    }
}
