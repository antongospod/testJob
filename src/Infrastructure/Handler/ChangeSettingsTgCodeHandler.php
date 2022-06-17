<?php

declare(strict_types=1);

namespace App\Infrastructure\Handler;

use App\Command\ChangeSettingsTgCode;
use App\Domain\Enumeration\SendEventTypeEnum;
use App\Infrastructure\Client\Request\Request;
use HttpResponseException;

final class ChangeSettingsTgCodeHandler extends AbstractSendServiceHandler
{
    /**
     * @throws HttpResponseException
     */
    public function __invoke(ChangeSettingsTgCode $command): void
    {
        /**
         * Генерируем $messageUuid
         */
        $messageUuid = 'xxxxxxxx-xxxx-Mxxx-Nxxx-xxxxxxxxxxxx';

        $this->sendRequest(new Request(
            $command->getTo(),
            SendEventTypeEnum::CHANGE_SETTINGS_TELEGRAM_CODE,
            "Код для подтверждения смены настроек: {$command->getCode()}",
            $messageUuid,
            $command->getContractorId()
        ));
    }
}