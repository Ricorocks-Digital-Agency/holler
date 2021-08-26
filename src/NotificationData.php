<?php

namespace RicorocksDigitalAgency\Holler;

use Illuminate\Notifications\DatabaseNotification;
use RicorocksDigitalAgency\Holler\Contracts\NotificationType;
use RicorocksDigitalAgency\Holler\Exceptions\InvalidNotificationTypeException;

class NotificationData implements Contracts\NotificationData
{
    /**
     * @var class-string
     */
    private string $notificationTypeClass;

    public NotificationType $type;

    public string $title;

    public string $detail;

    public ?string $icon;

    public ?string $url;

    public function __construct(string $notificationTypeClass = null)
    {
        $this->notificationTypeClass = $notificationTypeClass ?? Enums\NotificationType::class;
    }

    public function from(DatabaseNotification $notification): Contracts\NotificationData
    {
        if (!in_array(NotificationType::class, class_implements($this->notificationTypeClass))) {
            throw new InvalidNotificationTypeException($this->notificationTypeClass);
        }

        $this->type = forward_static_call([$this->notificationTypeClass, 'from'], $notification->type);
        $this->title = $notification->data['title'];
        $this->detail = $notification->data['detail'];
        $this->icon = $notification->data['icon'];
        $this->url = $notification->data['url'];

        return $this;
    }

    public function to(DatabaseNotification $notification): DatabaseNotification
    {
        return $notification->forceFill([
            'type' => $this->type->value,
            'data' => [
                'title' => $this->title,
                'detail' => $this->detail,
                'icon' => $this->icon,
                'url' => $this->url,
            ],
        ]);
    }

    public function getType(): NotificationType
    {
        return $this->type;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDetail(): string
    {
        return $this->detail;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }
}
