<?php

declare(strict_types=1);

namespace App\Domain\Enumeration;

/**
 * Типы событий для отправки sms/tg/email (В идеале слать какой-то микросервис, но в данном кейсе рассмотрим внутри монолита)
 */
interface SendEventTypeEnum
{
    public const CHANGE_SETTINGS_SMS_CODE = 'xxxxxxxx-xxxx-Mxxx-Nxxx-xxxxxxxxxxxx';

    public const CHANGE_SETTINGS_TELEGRAM_CODE = 'xxxxxxxx-xxxx-Mxxx-Nxxx-xxxxxxxxxxxx';

    public const CHANGE_SETTINGS_EMAIL_CODE = 'xxxxxxxx-xxxx-Mxxx-Nxxx-xxxxxxxxxxxx';
}