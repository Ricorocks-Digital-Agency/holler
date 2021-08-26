<?php

namespace RicorocksDigitalAgency\Holler\Contracts;

use Illuminate\Notifications\DatabaseNotification;

interface NotificationData
{
    public function from(DatabaseNotification $notification): self;

    public function to(DatabaseNotification $notification): DatabaseNotification;

    public function getType(): NotificationType;

    public function getTitle(): string;

    public function getDetail(): string;

    public function getIcon(): ?string;

    public function getUrl(): ?string;
}
