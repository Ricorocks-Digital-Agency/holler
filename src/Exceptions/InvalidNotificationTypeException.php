<?php

namespace RicorocksDigitalAgency\Holler\Exceptions;

use InvalidArgumentException;

class InvalidNotificationTypeException extends InvalidArgumentException
{
    /**
     * @param class-string $givenType
     */
    public function __construct(string $givenType)
    {
        parent::__construct("{$givenType} does not implement the [NotificationType] contract.");
    }
}
