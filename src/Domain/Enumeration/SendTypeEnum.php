<?php

declare(strict_types=1);

namespace App\Domain\Enumeration;

/**
 * Типы отправляемых сообщений
 */
interface SendTypeEnum
{
    public const CHANGE_SETTINGS_SMS = 'sms';

    public const CHANGE_SETTINGS_TELEGRAM = 'telegram';

    public const CHANGE_SETTINGS_EMAIL = 'email';

    public const NAMES = [
        self::CHANGE_SETTINGS_SMS => 'СМС',
        self::CHANGE_SETTINGS_TELEGRAM => 'Telegram',
        self::CHANGE_SETTINGS_EMAIL => 'Email',
    ];
}