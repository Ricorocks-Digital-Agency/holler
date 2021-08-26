<?php

namespace RicorocksDigitalAgency\Holler\Tests\Doubles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\HasDatabaseNotifications;

final class User extends Model
{
    use HasDatabaseNotifications;
}
