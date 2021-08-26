<?php

namespace RicorocksDigitalAgency\Holler\Providers;

use Illuminate\Support\ServiceProvider;
use RicorocksDigitalAgency\Holler\Contracts;
use RicorocksDigitalAgency\Holler\Enums\NotificationType;
use RicorocksDigitalAgency\Holler\NotificationData;

final class HollerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Contracts\NotificationData::class, NotificationData::class);
        $this->app->bind(Contracts\NotificationType::class, NotificationType::class);
    }
}
