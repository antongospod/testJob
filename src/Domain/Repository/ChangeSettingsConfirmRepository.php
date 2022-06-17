<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Infrastructure\Dto\SendCodeDto;

interface ChangeSettingsConfirmRepository
{
    public function insert(SendCodeDto $sendCodeDto, string $contractorId): void;

    public function getLastConfirmCodeByContractorAndType(string $type, string $contractorId): ?int;
}