<?php

declare(strict_types=1);

namespace App\Infrastructure\Service;

use App\Command\ChangeSettingsEmailCode;
use App\Command\ChangeSettingsSmsCode;
use App\Command\ChangeSettingsTgCode;
use App\Domain\Enumeration\SendTypeEnum;
use App\Domain\Repository\ChangeSettingsConfirmRepository;
use App\Infrastructure\Dto\ConfirmCodeDto;
use App\Infrastructure\Dto\SendCodeDto;
use ErrorException;
use InvalidArgumentException;
use RuntimeException;
use Throwable;

class ChangeSettingsConfirmService
{
    private ChangeSettingsConfirmRepository $changeSettingsConfirmRepository;

    public function __construct(ChangeSettingsConfirmRepository $changeSettingsConfirmRepository)
    {
        $this->changeSettingsConfirmRepository = $changeSettingsConfirmRepository;
    }

    /**
     * @throws ErrorException
     */
    public function confirmCode(ConfirmCodeDto $confirmCodeDto, string $contractorId): void
    {
        $lastCode = $this->changeSettingsConfirmRepository->getLastConfirmCodeByContractorAndType(
            $confirmCodeDto->getSendType(),
            $contractorId
        );

        if ($lastCode === null) {
            throw new ErrorException('Код подтверждения не найден');
        }

        //условно проверка на совпадение кода подтверждения и если всё ок меняем настройки

        $this->confirmSettings($confirmCodeDto, $contractorId);
    }

    public function saveCodeAndSend(SendCodeDto $sendCodeDto, string $contractorId): void
    {
        $this->saveCode($sendCodeDto, $contractorId);
        $this->sendCode($sendCodeDto, $contractorId);
    }

    private function saveCode(SendCodeDto $sendCodeDto, string $contractorId): void
    {
        //какая-то логика
        $this->changeSettingsConfirmRepository->insert($sendCodeDto, $contractorId);
        //logger
    }

    /**
     * В примере просто наполним наш message данными, в реальных условиях диспатчим событие
     */
    private function sendCode(SendCodeDto $sendCodeDto, string $contractorId): void
    {
        // логика
        try {
            //какие-то проверки, лимиты и тд
            switch ($sendCodeDto->getSendType()) {
                case SendTypeEnum::CHANGE_SETTINGS_SMS:
                    //dispatch ChangeSettingsSmsCode event
                    $message = new ChangeSettingsSmsCode(
                        $sendCodeDto->getTo(),
                        $sendCodeDto->getCode(),
                        $contractorId
                    );

                    print_r($message);
                    break;
                case SendTypeEnum::CHANGE_SETTINGS_TELEGRAM:
                    //dispatch ChangeSettingsTgCode event
                    $message = new ChangeSettingsTgCode(
                        $sendCodeDto->getTo(),
                        $sendCodeDto->getCode(),
                        $contractorId
                    );

                    print_r($message);
                    break;
                case SendTypeEnum::CHANGE_SETTINGS_EMAIL:
                    //dispatch ChangeSettingsEmailCode event
                    $message = new ChangeSettingsEmailCode(
                        $sendCodeDto->getTo(),
                        $sendCodeDto->getCode(),
                        $contractorId
                    );

                    print_r($message);
                    break;
                default:
                    throw new InvalidArgumentException('Неверный тип отправляемого сообщения');
            }
        } catch (Throwable $exception) {
            throw new RuntimeException($exception->getMessage(), $exception->getCode());
        }
    }

    private function confirmSettings(ConfirmCodeDto $confirmCodeDto, string $contractorId): void
    {
        // тут логика смены настроек
    }
}