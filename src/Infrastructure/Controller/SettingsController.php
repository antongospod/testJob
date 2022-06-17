<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use App\Infrastructure\Dto\ConfirmCodeDto;
use App\Infrastructure\Dto\SendCodeDto;
use App\Infrastructure\Service\ChangeSettingsConfirmService;
use HttpResponseException;
use Throwable;

class SettingsController
{
    private ChangeSettingsConfirmService $changeSettingsConfirmService;

    public function __construct(ChangeSettingsConfirmService $changeSettingsConfirmService)
    {
        $this->changeSettingsConfirmService = $changeSettingsConfirmService;
    }

    /**
     * @throws HttpResponseException
     */
    private function sendConfirmationCode(): array
    {
        //получили данные из реквеста, провалидировали, что-то там еще сделали и поехали дальше
        $contractorId = 'xxxxxxxx-xxxx-Mxxx-Nxxx-xxxxxxxxxxxx';

        try {
            $sendCodeDto = new SendCodeDto(
                'test@test.com',
                'email',
                '5553535',
                '127.0.0.1'
            );

            $this->changeSettingsConfirmService->saveCodeAndSend($sendCodeDto, $contractorId);
        } catch (Throwable $exception) {
            throw new HttpResponseException($exception->getMessage(), $exception->getCode());
        }

        return ['status' => 'success'];
    }

    /**
     * @throws HttpResponseException
     */
    private function changeSettingsConfirm(): array
    {
        //получили данные из реквеста, провалидировали, что-то там еще сделали и поехали дальше
        $contractorId = 'xxxxxxxx-xxxx-Mxxx-Nxxx-xxxxxxxxxxxx';

        try {
            $sendCodeDto = new ConfirmCodeDto(
                'test@test.com',
                'email',
                5553535,
                '127.0.0.1'
            );

            $this->changeSettingsConfirmService->confirmCode($sendCodeDto, $contractorId);
        } catch (Throwable $exception) {
            throw new HttpResponseException($exception->getMessage(), $exception->getCode());
        }

        return ['status' => 'success'];
    }
}