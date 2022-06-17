<?php

declare(strict_types=1);

namespace App\Infrastructure\Handler;

use App\Command\ChangeSettingsSmsCode;
use App\Domain\Enumeration\SendEventTypeEnum;
use App\Infrastructure\Client\Request\Request;
use HttpResponseException;

final class ChangeSettingsSmsCodeHandler extends AbstractSendServiceHandler
{
    /**
     * @throws HttpResponseException
     */
    public function __invoke(ChangeSettingsSmsCode $command): void
    {
        /**
         * Генерируем $messageUuid
         */
        $messageUuid = 'xxxxxxxx-xxxx-Mxxx-Nxxx-xxxxxxxxxxxx';

        $this->sendRequest(new Request(
            $command->getTo(),
            SendEventTypeEnum::CHANGE_SETTINGS_SMS_CODE,
            "Код для подтверждения смены настроек: {$command->getCode()}",
            $messageUuid,
            $command->getContractorId()
        ));
    }
}