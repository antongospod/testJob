<?php

declare(strict_types=1);

namespace App\Infrastructure\Handler;

use App\Command\ChangeSettingsEmailCode;
use App\Domain\Enumeration\SendEventTypeEnum;
use App\Infrastructure\Client\Request\Request;
use HttpResponseException;

final class ChangeSettingsEmailCodeHandler extends AbstractSendServiceHandler
{
    /**
     * @throws HttpResponseException
     */
    public function __invoke(ChangeSettingsEmailCode $command): void
    {
        /**
         * Генерируем $messageUuid
         */
        $messageUuid = 'xxxxxxxx-xxxx-Mxxx-Nxxx-xxxxxxxxxxxx';

        $this->sendRequest(new Request(
            $command->getTo(),
            SendEventTypeEnum::CHANGE_SETTINGS_EMAIL_CODE,
            "Код для подтверждения смены настроек: {$command->getCode()}",
            $messageUuid,
            $command->getContractorId()
        ));
    }
}