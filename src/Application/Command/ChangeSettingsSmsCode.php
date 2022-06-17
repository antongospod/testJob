<?php

declare(strict_types=1);

namespace App\Command;

final class ChangeSettingsSmsCode
{
    /**
     * Номер куда отправляем смс
     */
    private string $to;

    /**
     * Код подтверждения
     */
    private string $code;

    /**
     * ID пользователя
     */
    private string $contractorId;

    public function __construct(string $to, string $code, string $contractorId)
    {
        $this->to = $to;
        $this->code = $code;
        $this->contractorId = $contractorId;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getContractorId(): string
    {
        return $this->contractorId;
    }
}