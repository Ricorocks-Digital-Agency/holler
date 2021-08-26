<?php

namespace RicorocksDigitalAgency\Holler\Contracts;

/**
 * @property string $value
 */
interface NotificationType
{
    /**
     * @param string $value
     *
     * @return self
     */
    public static function from($value);
}
