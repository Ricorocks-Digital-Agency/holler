<?php

use Illuminate\Notifications\DatabaseNotification;
use RicorocksDigitalAgency\Holler\Enums\NotificationType;
use RicorocksDigitalAgency\Holler\NotificationData;
use RicorocksDigitalAgency\Holler\Tests\Doubles\User;

it('can build structured notification data from a notification model', function () {
    $data = (new NotificationData())->from(notification(
        new User(),
        NotificationType::general(),
        'Hello World',
        'I can be converted'
    ));

    expect($data)
        ->getType()->toBe(NotificationType::general())
        ->getTitle()->toBe('Hello World')
        ->getDetail()->toBe('I can be converted')
        ->getIcon()->toBeNull
        ->getUrl()->toBeNull;
});

it('can convert structured notification data back to a notification model', function () {
    $data = (new NotificationData());
    $data->type = NotificationType::general();
    $data->title = 'Hello World';
    $data->detail = 'I can be converted';
    $data->icon = 'some-groovy-icon';
    $data->url = 'https://google.com';

    expect($data->to(new DatabaseNotification()))
        ->toBeInstanceOf(DatabaseNotification::class)
        ->type->toBe(NotificationType::general()->value)
        ->data->title->toBe('Hello World')
        ->data->detail->toBe('I can be converted')
        ->data->icon->toBe('some-groovy-icon')
        ->data->url->toBe('https://google.com');
});
