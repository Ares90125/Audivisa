<?php
namespace App\Enums\User;

use App\Enums\BaseEnum;

final class Type extends BaseEnum
{
    const ADMIN = "admin";
    const PLAYER = "player";

    public static function asList(): array {
        return [
            self::ADMIN => "admin",
            self::PLAYER => "player",
        ];
    }
}
