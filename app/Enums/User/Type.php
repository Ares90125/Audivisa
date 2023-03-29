<?php
namespace App\Enums\User;

use App\Enums\BaseEnum;

final class Type extends BaseEnum
{
    const TEACHER = "teacher";
    const PARENT = "parent";
    const STUDENT = "student";

    public static function asList(): array {
        return [
            self::TEACHER=> "teacher",
            self::PARENT => "parent",
            self::STUDENT => "student"
        ];
    }
}
